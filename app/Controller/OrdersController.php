<?php

class OrdersController extends AppController
{
	public $uses = array(
		'Order',
		'WriterOrder',
		'ClientOrder',
		'OrderDeliveryOption',
		'ArticleTemplate',
		'Keyword',
		'WriterAssignment'
	);	
	
	
	function beforeFilter()
	{
		parent::beforeFilter();
		
		$this->Auth->allow('pay', 'paypal_ipn','payment_return');
	}
	
	function admin_list( $status = 'all')
	{
		// $this->Order->bindModel(array( 'hasOne' => array( 'WriterOrder' ) ), false);
		
		$conditions = array();
		
		if($status != 'all')
		{
			$conditions['Order.status'] = $status;
		}
		
		$this->paginate	= array(
			'conditions' 	=>	$conditions,
			'limit'			=>	20,
			'recursive' 	=> 3
		);
		
    	$orders =	$this->paginate('Order');		
		
		$this->set('orders', $orders);		
		$this->set('status', $status);
				
	}
	
	public function admin_add() 
	{
		$this->admin_edit(null);
	}
	
	public function admin_edit($id)
	{
		$this->Order->bindModel(array( 'hasOne' => array( 'WriterOrder' ) ), false);
		
		$orderData = $id ? $this->Order->find('first', array('conditions' => array('Order.id' => $id), 'recursive' => 2)) : null;
		
		if($this->request->is('post'))
		{
			
			$keywordDataInitial = empty($this->request->data['WriterOrder']['Keyword']) ? array(): $this->request->data['WriterOrder']['Keyword'];
			$keywordIndex = 0;
			 
			if(!empty($this->request->data['WriterOrder']['keywords']))
			{
				$this->request->data['WriterOrder']['Keyword'] = $this->Keyword->unpackKeywords($this->request->data['WriterOrder']['keywords'], $keywordDataInitial);
				
				$keywordIndex = count($this->request->data['WriterOrder']['Keyword']);
			}
			
			
			
		
		    if ($this->Order->saveAssociated($this->request->data, array('validate' => 'first', 'deep' => true))) 
		    {
		        // remove keywords
		        
				if(!empty($keywordDataInitial))
				{
					for($j = $keywordIndex; $j < count($keywordDataInitial); $j++ )
					{
						if(!empty($keywordDataInitial[$j]['id']))
						{
							$this->Keyword->delete($keywordDataInitial[$j]['id']);
						}
					}
				}		   
				
				$this->Session->setFlash( $id ? __('Saved successfully') : __('Order created successfully'));     
		        
		        /*
		        if( !$keywordIndexd )
		        {
		        	$this->newOrderNotification($this->Order->id);
		        }
		        */
		        
		        $this->redirect('/admin/orders/edit/'.$this->Order->id);
		    }
		}
		else
		{
			$orderData['WriterOrder']['keywords'] = join("\n", Set::extract('/WriterOrder/Keyword/keyword', $orderData) );
			
			$this->data = $orderData;
			
		}		
		
		$this->set('clients', $this->User->find('list', array('conditions' => array('User.type' => 'client'), 'fields' => array('id', 'username') )) );
		$this->set('managers', $this->User->find('list', array('conditions' => array('User.type' => 'manager'), 'fields' => array('id', 'username') )) );		
		$this->set('articleTemplates', $this->ArticleTemplate->find('list', array('fields' => array('ArticleTemplate.id', 'ArticleTemplate.name'))));
		$this->set('deliveryOptions', $this->OrderDeliveryOption->find('list', array('fields' => array('OrderDeliveryOption.id', 'OrderDeliveryOption.description'))));		
		
		
	}	
	
	
	
	public function admin_assign($id) 
	{
		$this->Order->bindModel(array( 'hasOne' => array( 'WriterOrder' ) ), false);
		
		$orderData = $id ? $this->Order->find('first', array('conditions' => array('Order.id' => $id), 'recursive' => 2)) : null;
		
		if($this->request->is('post'))
		{
			if($this->WriterAssignment->save($this->request->data))
			{
				 $this->Session->setFlash( __('Order was assigned successfully'));
				 
				 $this->newAssignmentNotification($this->WriterAssignment->id);
				 
				 $this->redirect('/admin/articles/list_by_order/'.$id);
			}
		}
		else
		{
			$this->data = $orderData;
		}
		
		$this->set('order', $orderData);
		$this->set('writers', $this->User->find('list', array('conditions' => array('User.type' => 'writer'), 'fields' => array('id', 'username') )) );
	}		
	
	private function newOrderNotification($orderId)
	{
		$this->Order->bindModel(array( 'hasOne' => array( 'WriterOrder' ) ), false);
		$this->Order->recursive = 3;
		
		if( $order = $this->Order->read(null, $orderId) )
		{
			// $this->set('order', $order);
			
			try
			{
				// email the manager
				$email = new CakeEmail();
				$subject = __('New order has been submitted');
				$email->from( Configure::read('Email.noreplyAddress'));
				$email->viewVars(array('order' => $order));
				$email->helpers(array('Html', 'Text'));
				$email->template('manager_new_order');
				$email->to( $order['WriterOrder']['Manager']['email'] );
				$email->subject( $subject );
				$email->send();
			}
			catch(CakeException $e)
			{
				
			}			
			
		}
		
		return false;
	}
	
	public function pay($orderId)
	{
		$order = $this->Order->read(null, $orderId);
		
		if($order['Order']['payment_status'] == 'completed')
		{
			$this->redirect('/orders/payment_return/' . $orderId );
		}
		
		$this->set(compact('order'));
		$this->helpers[]='PaypalIpn.Paypal';
	}
	
	
	/**
	 * Paypal landing page
	 * @var $orderId 
	 * @var $paymentResult - 'success', 'cancel'
	 */
	public function payment_return( $orderId, $paymentResult = 'success' )
	{
		// /payment_return/6?tx=47079660X7883790R&st=Completed&amt=36.00&cc=USD&cm=&item_number=6
		
		$order = $this->Order->read(null, $orderId);
		
		$transactionId = empty($this->request->query['tx']) ? false : $this->request->query['tx'];
		
		$this->set(compact('order','paymentResult'));
		
	}
	
	
	public function manager_list( $status = 'pending') 
	{
		$this->paginate	= array(
			'conditions' =>	array(
				'Order.payment_status' => 'completed',
				'Order.status'		   => $status
			),
			'limit'	=>	20,
			'recursive' => 3
		);
		
    	$orders =	$this->paginate('Order');		
		
		$this->set(compact('orders', 'status'));	
	}	
	
	public function manager_view($orderId)
	{
		$this->Order->bindModel(array( 'hasOne' => array( 'WriterOrder' ) ), false);
		$this->Order->recursive = 2;
		$this->WriterOrder->bindModel(array('hasOne' => array('WriterAssignment')), false);
		
		$orderData = $order = $this->Order->read(null, $orderId);
		
		$writers = $this->User->find('list', array('conditions' => array('User.type' => 'writer'), 'fields' => array('id', 'username') ));
		$articleTemplates =	$this->ArticleTemplate->find('list', array('fields' => array('ArticleTemplate.id', 'ArticleTemplate.name')));
		$exisitngAssignmentsCount = array(
			'total'			=> $this->WriterAssignment->find('count', array('conditions' => array('WriterOrder.order_id' => $orderId))),
			'in_progress'	=> $this->WriterAssignment->find('count', array('conditions' => array('WriterOrder.order_id' => $orderId, 'WriterAssignment.status' => 'in_progress'))),
			'completed'		=> $this->WriterAssignment->find('count', array('conditions' => array('WriterOrder.order_id' => $orderId, 'WriterAssignment.status' => 'completed')))
		); 
		
		
		
		if($this->request->is('post'))
		{
			
			$keywordDataInitial = empty($this->request->data['WriterOrder']['Keyword']) ? array(): $this->request->data['WriterOrder']['Keyword'];
			$keywordIndex = 0;
			 
			 
			 
			if(!empty($this->request->data['WriterOrder']['keywords']))
			{
				$this->request->data['Keyword'] = $this->Keyword->unpackKeywords($this->request->data['WriterOrder']['keywords']);
			}
		
		    if ($this->WriterOrder->saveAssociated($this->request->data, array('validate' => 'first', 'deep' => true))) 
		    {
		        // remove keywords
		        
				if(!empty($keywordDataInitial))
				{
					for($j = $keywordIndex; $j < count($keywordDataInitial); $j++ )
					{
						if(!empty($keywordDataInitial[$j]['id']))
						{
							$this->Keyword->delete($keywordDataInitial[$j]['id']);
						}
					}
				}		   
				
				// Order status update
				
				$this->Order->id = $orderId;
				$this->Order->save(array(
					'status'	=> 'in_progress'
				), false);
				
				
				// notify a writer
				$this->newAssignmentNotification($this->WriterOrder->WriterAssignment->id);
				
				$this->Session->setFlash( __('Assignment was created successfully'));     
		        
		        $this->redirect('/manager/orders/view/'.$orderId);
		    }
		}
		else
		{
			// $orderData['WriterOrder']['keywords'] = join("\n", Set::extract('/WriterOrder/Keyword/keyword', $orderData) );
			
			// $this->data = $orderData;
			
		}		
		
		$existingAssignments = $this->WriterAssignment->find('all', array( 'conditions' => array('WriterOrder.order_id' => $orderId ), 'recursive' => 0 ) );
		
		
		
		$this->set(compact('order', 'writers', 'articleTemplates', 'exisitngAssignmentsCount', 'existingAssignments'));
	}
	
	protected function newAssignmentNotification($writerAssignmentId)
	{
		$this->WriterAssignment->recursive = 3;
		
		if( $writerAssignment = $this->WriterAssignment->read(null, $writerAssignmentId) )
		{
			try
			{
				// email the manager
				$email = new CakeEmail();
				$subject = __('New Article was submitted');
				$email->from( Configure::read('Email.noreplyAddress'));
				$email->helpers(array('Html', 'Text'));
				$email->viewVars( array('writerAssignment' => $writerAssignment) );
				$email->template('writer_new_assignment');
				$email->to( $writerAssignment['Writer']['email'] );
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