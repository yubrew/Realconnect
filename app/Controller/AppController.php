<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $uses = array(
		'User',
		'PaypalIpn.InstantPaymentNotification',
		'Order'
	);
	
	public $components = array(
	    'Auth' => array(
	        'authenticate' => array(
	            'Form' => array(
	                'fields' => array(
						'username' => 'email'
					),
	                'scope'	=> array(
	                	'User.status'	=> 'active'
	                )
	            )
	        ),
	        'loginAction' => '/users/login'
	    ),
	    'Session'
	);	
	
	public $helpers = array(
    	'Paginator' => array(
        	'className' => 'CustomPaginator'
        ),
        'Session',
        'Html',
        'Form',
        'Time'
    );
	
	protected $user = false;	
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		
		$userData = $this->Auth->user();
		$this->user = $userData ? array('User' => $userData) : false;
		$this->set('user', $this->user );
		
		if( $this->user && !empty($this->request->params['prefix']))
		{
			if($this->user['User']['type']!=$this->request->params['prefix'])
			{
				throw new CakeException($this->request->params['prefix'] .' access permission is required ');
			}
		}
		// if( $this->request)

	}
	
	public function afterPaypalNotification($txnId)
	{ 
	    //Here is where you can implement code to apply the transaction to your app. 
	    //for example, you could now mark an order as paid, a subscription, or give the user premium access. 
	    //retrieve the transaction using the txnId passed and apply whatever logic your site needs. 
	     
	    $transaction = ClassRegistry::init('PaypalIpn.InstantPaymentNotification')->findById($txnId); 
	    
	    $this->log($transaction['InstantPaymentNotification']['id'], 'paypal'); 
	
	    //Tip: be sure to check the payment_status is complete because failure transactions  
	    //     are also saved to your database for review. 
	
	    if($transaction['InstantPaymentNotification']['payment_status'] == 'Completed')
	    { 
	      //Yay!  We have monies! 
	      
	      list($itemObject, $itemId ) = explode('-', $transaction['InstantPaymentNotification']['item_number'], 2);
	      if($itemObject == 'Order')
	      {
	      		$this->Order->id = $itemId;
	      		$this->Order->save(array(
	      			'payment_status'					=> 'completed',
	      			'instant_payment_notification_id'	=> $transaction['InstantPaymentNotification']['id']
	      			
	      		));
	      		
	      		$this->orderPaidSuccessfully($itemId);
	      }
	      
	    } 
	    else 
	    { 
	      //Oh no, better look at this transaction to determine what to do; like email a decline letter. 
	    } 
	}
	
	protected function orderPaidSuccessfully($orderId)
	{
		// $this->Order->bindModel(array( 'hasOne' => array( 'WriterOrder' ) ), false);
		// $this->Order->recursive = 3;
		
		if( $order = $this->Order->read(null, $orderId) )
		{
			// $this->set('order', $order);
			
			try
			{
				// email the manager
				$email = new CakeEmail();
				
				$subject = __('Your order was submitted successfully');
				
				$email->from( Configure::read('Email.noreplyAddress'));
				
				$email->viewVars(array('order' => $order));
				
				$email->helpers(array('Html', 'Text'));
				
				$email->template('client_new_order');
				
				$email->to( $order['Client']['email'] );
				
				$email->subject( $subject );
				$email->send();
			}
			catch(CakeException $e)
			{
				
			}			
			
		}
		
		return false;		
	} 	
	
}
