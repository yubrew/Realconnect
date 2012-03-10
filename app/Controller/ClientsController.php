<?php

class ClientsController extends AppController
{
	var $uses = array(
		'Order',
		'OrderDeliveryOption'
	);
	
	public function beforeFilter()
	{
		
		parent::beforeFilter();
		
		$this->Auth->allow('home');
	}
	
	public function home()
	{
		
		
		
		if($this->request->is('post'))
		{
			unset($this->User->validate['email']['unique']);
			unset($this->User->validate['username']['unique']);
			
			$this->User->create($this->request->data);
			$this->Order->create($this->request->data);
				
				
			$userValidates = $this->User->validates();			
			$orderValidates = $this->Order->validates();
			
			if( $orderValidates )
			{

				
				if( $userValidates )
				{
					if(!($existingUser = $this->User->find('first', array( 'conditions' => array( 'User.email' => $this->User->data['User']['email']) ))))
					{
						$this->User->data['User'] = am( $this->User->data['User'], array(
							'type'				=> 'client',
							'registered_date'  	=> date('Y-m-d H:i:s'),
							'status'			=> 'active',
							'password'			=> 'client_password_14623529456345' // this is static currently
						));
						$this->User->save();
						$existingUser = $this->User->read();
					}
					
					
					
					$this->Order->data['Order'] = am( $this->Order->data['Order'], array(
						'user_id' 		=> $existingUser['User']['id'],
						'create_date'	=> date('Y-m-d H:i:s')
					));
					
					$this->Order->save();
					
					$this->redirect('/orders/pay/'.$this->Order->id);					
					
					
				}
				


				
			}
			
		}
		
		$deliveryOptions = $this->OrderDeliveryOption->find('all', array( 'conditions' => array( 'OrderDeliveryOption.id' => 1 ), 'order' => 'OrderDeliveryOption.id ASC'));
		// $deliveryOptions = $this->OrderDeliveryOption->find('all', array('order' => 'OrderDeliveryOption.id ASC'));
		$this->set(compact('deliveryOptions'));
	}	 
		
}