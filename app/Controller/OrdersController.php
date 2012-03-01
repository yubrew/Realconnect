<?php

class OrdersController extends AppController
{
	public $uses = array(
		'Order',
		'ClientOrder',
		'OrderDeliveryOption',
		'ArticleTemplate',
		'Keyword',
		'WriterAssignment'
	);	
	
	function admin_list()
	{
		$this->Order->bindModel(array( 'hasOne' => array( 'WriterOrder' ) ), false);
		
		$this->paginate	= array(
			'conditions' =>	array(),
			'limit'	=>	20,
			'recursive' => 3
		);
		
    	$orders =	$this->paginate('Order');		
		
		$this->set('orders', $orders);		
		
				
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
			
			 
			if(!empty($this->request->data['WriterOrder']['Keyword']))
			{
				$keywords = $this->request->data['WriterOrder']['Keyword'];
				
				foreach( $this->request->data['WriterOrder']['Keyword'] as $index => $keyword )
				{
					$kw = trim($keyword['keyword']);
					if( $kw == "" )
					{
						if(!empty($keyword['id']))
						{
							$this->Keyword->delete($keyword['id']);
						}
						unset($keywords[$index]);
					}
				}
				
				if( $keywords )
				{
					$this->request->data['WriterOrder']['Keyword'] = array_values($keywords);
				}
				else
				{
					unset($this->request->data['WriterOrder']['Keyword']);
				}
			}
			
		
		    if ($this->Order->saveAssociated($this->request->data, array('validate' => 'first', 'deep' => true))) 
		    {
		        $this->Session->setFlash( $id ? __('Saved successfully') : __('Order created successfully'));
		        
		        /*
		        if( !$id )
		        {
		        	$this->newOrderNotification($this->Order->id);
		        }
		        */
		        
		        $this->redirect('/admin/orders/edit/'.$this->Order->id);
		    }
		}
		else
		{
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
	
	private function newAssignmentNotification($writerAssignmentId)
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