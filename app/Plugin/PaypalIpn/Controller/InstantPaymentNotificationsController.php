<?php

class InstantPaymentNotificationsController extends PaypalIpnAppController {

	var $name = 'InstantPaymentNotifications';
	var $helpers = array('Html', 'Form');
	var $components = array('Email');

/**
 * beforeFilter makes sure the process is allowed by auth
 *  since paypal will need direct access to it.
 */
	function beforeFilter(){
		parent::beforeFilter();
		if (isset($this->Auth)) {
			$this->Auth->allow('process');
		}
		if (isset($this->Security) && $this->action == 'process') {
		  $this->Security->validatePost = false;
		}
	}

/**
 * Paypal IPN processing action..
 * Intake for a paypal_ipn callback performed by paypal itself.
 * This action will take the paypal callback, verify it (so trickery) and
 * save the transaction into your database for later review
 *
 * @access public
 * @author Nick Baker
 */
	function process() {
		
		// $srcString = 'mc_gross=36.00&protection_eligibility=Eligible&address_status=confirmed&payer_id=ECKCJWMTSD8PN&tax=0.00&address_street=1 Main St&payment_date=01:48:14 Mar 06, 2012 PST&payment_status=Completed&charset=windows-1252&address_zip=95131&first_name=buyerfirstname&mc_fee=1.34&address_country_code=US&address_name=Business&notify_version=3.4&custom=&payer_status=unverified&business=s1_1331026488_biz@gmail.com&address_country=United States&address_city=San Jose&quantity=1&verify_sign=AXiF8kVaPH1fhWnvmllg.pw.466oAKPwPpizKRuRtspYsM7K74cBVseu&payer_email=b.test_1331023546_per@gmail.com&txn_id=92C01753L9318762E&payment_type=instant&payer_business_name=Business&last_name=buyerlastname&address_state=CA&receiver_email=s1_1331026488_biz@gmail.com&payment_fee=1.34&receiver_id=5ZAFK7S57VPQJ&txn_type=web_accept&item_name=Order #6 : 6 Articles&mc_currency=USD&item_number=Order-6&residence_country=US&test_ipn=1&handling_amount=0.00&transaction_subject=Order #6 : 6 Articles&payment_gross=36.00&shipping=0.00&ipn_track_id=12e87af5885e7';
		// $result = array();
		// parse_str( $srcString, $result);
		
		// $_POST = $result;
		
		// var_dump($_POST);exit;
		
		$this->log('IPN triggered : '.var_export($_POST, true), 'paypal');
		
		if ($this->InstantPaymentNotification->isValid($_POST)) 
		{
			$notification = $this->InstantPaymentNotification->buildAssociationsFromIPN($_POST);

			$existingIPNId = $this->InstantPaymentNotification->searchIPNId($notification);
			if ($existingIPNId !== false) {
				$notification['InstantPaymentNotification']['id'] = $existingIPNId;
			}

			$this->InstantPaymentNotification->saveAll($notification);
			$this->__processTransaction($this->InstantPaymentNotification->id);
		}
		else
		{
			$this->log('IPN is not valid '.@$_POST['txn_id']);
			
		}
		
		$this->autoRender = $this->autoLayout = false;
		
		// $this->redirect('/');
	}

/**
 * __processTransaction is a private callback function used to log a verified transaction
 * @access private
 * @param String $txnId is the string paypal ID and the id used in your database.
 */
	private function __processTransaction($txnId){
		$this->log("Processing Trasaction: {$txnId}", 'paypal');
		//Put the afterPaypalNotification($txnId) into your app_controller.php
		$this->afterPaypalNotification($txnId);
	}

/**
 * Admin Only Functions... all baked
 */

/**
 * Admin Index
 */
	function admin_index() {
		$this->InstantPaymentNotification->recursive = 0;
		$this->set('instantPaymentNotifications', $this->paginate());
	}

/**
 * Admin View
 * @param String ID of the transaction to view
 */
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid InstantPaymentNotification.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('instantPaymentNotification', $this->InstantPaymentNotification->read(null, $id));
	}

/**
 * Admin Add
 */
	function admin_add(){
		 $this->redirect(array('admin' => true, 'action' => 'edit'));
	}

/**
 * Admin Edit
 * @param String ID of the transaction to edit
 */
	function admin_edit($id = null) {
		if (!empty($this->data)) {
			if ($this->InstantPaymentNotification->save($this->data)) {
				$this->Session->setFlash(__('The InstantPaymentNotification has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The InstantPaymentNotification could not be saved. Please, try again.', true));
			}
		}
		if ($id && empty($this->data)) {
			$this->data = $this->InstantPaymentNotification->read(null, $id);
		}
	}

/**
 * Admin Delete
 * @param String ID of the transaction to delete
 */
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for InstantPaymentNotification', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->InstantPaymentNotification->delete($id)) {
			$this->Session->setFlash(__('InstantPaymentNotification deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
