<?php

class InstantPaymentNotification extends PaypalIpnAppModel {
/**
 * name is the name of the model
 *
 * @var $name string
 * @access public
 */
	var $name = 'InstantPaymentNotification';

	var $hasMany = array(
		'PaypalItem' => array(
			'className' => 'PaypalIpn.PaypalItem',
		),
	);

/**
 * the PaypalSource
 */
	var $paypal = null;

/**
 * verifies POST data given by the paypal instant payment notification
 * @param array $data Most likely directly $_POST given by the controller.
 * @return boolean true | false depending on if data received is actually valid from paypal and not from some script monkey
 */
	function isValid($data) {
		if (!empty($data)) {
			
			/*
			if (!class_exists('PaypalIpnSource')) {
				
				App::import(array(
					'type' => 'File',
					'name' => 'PaypalIpn.PaypalIpnSource',
					'file' => 'Model' . DS . 'Datasource' . DS . 'PaypalIpnSource.php',
					'plugin' => 'PaypalIpn'
					
				));
			}
			*/
			
			if (!class_exists('PaypalIpnSource')) {
				trigger_error(__d('paypal_ipn', 'PaypalIpnSource: The datasource could not be found.', true), E_USER_ERROR);
			}
				
				
			$this->paypal = new PaypalIpnSource();
			return $this->paypal->isValid($data);
		}

		return false;
	}

/**
 * Utility method to send basic emails based on a paypal IPN transaction.
 * This method is very basic, if you need something more complicated I suggest
 * creating your own method in the afterPaypalNotification function you build
 * in the app_controller.php
 *
 * Example Usage: (InstantPaymentNotification = IPN)
 *   IPN->id = '4aeca923-4f4c-49ec-a3af-73d3405bef47';
 *   IPN->email('Thank you for your transaction!');
 *
 *   IPN->email(array(
 *       'id' => '4aeca923-4f4c-49ec-a3af-73d3405bef47',
 *       'subject' => 'Donation Complete!',
 *       'message' => 'Thank you for your donation!',
 *       'sendAs' => 'text'
 *   ));
 *
 *  Hint: use this in your afterPaypalNotification callback in your app_controller.php
 *   function afterPaypalNotification($txnId){
 *       ClassRegistry::init('PaypalIpn.InstantPaymentNotification')->email(array(
 *           'id' => $txnId,
 *           'subject' => 'Thanks!',
 *           'message' => 'Thank you for the transaction!'
 *       ));
 *   }
 *
 * Options:
 *   id: id of instant payment notification to base email off of
 *   subject: subject of email (default: Thank you for your paypal transaction)
 *   sendAs: html | text (default: html)
 *   to: email address to send email to (default: ipn payer_email)
 *   from: from email address (default: ipn business)
 *   cc: array of email addresses to carbon copy to (default: array())
 *   bcc: array of email addresses to blind carbon copy to (default: array())
 *   layout: layout of email to send (default: default)
 *   template: template of email to send (default: null)
 *   log: boolean true | false if you'd like to log the email being sent. (default: true)
 *   message: actual body of message to be sent (default: null)
 *
 * @param array $options of the ipn to send
 */
  function email($options = array()) {
		if (!is_array($options)) {
			$message = $options;
			$options = array();
			$options['message'] = $message;
		}

		if (isset($options['id'])) {
			$this->id = $options['id'];
		}

		$this->read();
		$defaults = array(
			'subject' => 'Thank you for your paypal transaction',
			'sendAs' => 'html',
			'to' => $this->data['InstantPaymentNotification']['payer_email'],
			'from' => $this->data['InstantPaymentNotification']['business'],
			'cc' => array(),
			'bcc' => array(),
			'layout' => 'default',
			'template' => null,
			'log' => true,
			'message' => null
		);
		$options = array_merge($defaults, $options);

		if ($options['log']) {
			$this->log("Emailing: {$options['to']} through the PayPal IPN Plugin. ",'email');
		}

		if (!class_exists('EmailComponent')) {
			App::import('Component','Email');
		}
		$Email = new EmailComponent;

		$Email->to = $options['to'];
		$Email->from = $options['from'];
		$Email->bcc = $options['bcc'];
		$Email->cc = $options['cc'];
		$Email->subject = $options['subject'];
		$Email->sendAs = $options['sendAs'];
		$Email->template = $options['template'];
		$Email->layout = $options['layout'];

		//Send the message.
		if ($options['message']) {
			$Email->send($options['message']);
		} else {
		  $Email->send();
		}
	}

/**
 * builds the associative array for paypalitems only if it was a cart upload
 *
 * @param raw post data sent back from paypal
 * @return array of cakePHP friendly association array.
 */
  function buildAssociationsFromIPN($post) {
		$retval = array();
		$retval['InstantPaymentNotification'] = $post;
		if (isset($post['num_cart_items']) && $post['num_cart_items'] > 0) {
			$retval['PaypalItem'] = array();
			for ($i=1;$i<=$post['num_cart_items'];$i++) {
				$key = $i - 1;
				$retval['PaypalItem'][$key]['item_name'] = $post["item_name{$i}"];
				$retval['PaypalItem'][$key]['item_number'] = $post["item_number{$i}"];
				$retval['PaypalItem'][$key]['item_number'] = $post["item_number{$i}"];
				$retval['PaypalItem'][$key]['quantity'] = $post["quantity{$i}"];
				$retval['PaypalItem'][$key]['mc_shipping'] = $post["mc_shipping{$i}"];
				$retval['PaypalItem'][$key]['mc_handling'] = $post["mc_handling{$i}"];
				$retval['PaypalItem'][$key]['mc_gross'] = $post["mc_gross_{$i}"];
				$retval['PaypalItem'][$key]['tax'] = $post["tax{$i}"];
			}
		}
		return $retval;
	}

/**
 * searches existing IPNs transactions using tnx_id or parent_tnx_id
 *
 * @param array $data
 * @return mixed false if not matched, existingIpnId otherwise
 * @todo Figure out what to do if more than one record is found
 */
	function searchIPNId($data = array()) {
		if (empty($data['InstantPaymentNotification']['tnx_id'])) {
			return false;
		}

		$ipns = $this->findAllByTnxId($data['InstantPaymentNotification']['tnx_id']);
		if (!empty($ipns) && (count($ipns) == 1)) {
			return $ipns[0]['InstantPaymentNotification']['id'];
		}

		$ipns = $this->findAllByParentTnxId($data['InstantPaymentNotification']['tnx_id']);
		if (!empty($ipns) && (count($ipns) == 1)) {
			return $ipns[0]['InstantPaymentNotification']['id'];
		}

		return false;
	}

}