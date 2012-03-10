<?php

class UsersController extends AppController
{
	public $uses = array(
		'WriterAssignment'
	);
	
	public function beforeFilter()
	{
		
		parent::beforeFilter();
		
		$this->Auth->allow('register');
	}
	
	public function login()	{
		
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	
	        	$type = $this->Auth->user('type');
	        	
	        	$userPages = array(
	        		'writer'	=> '/writer/dashboard',
	        		'manager'	=> '/manager/dashboard',
	        		'admin'		=> '/admin/dashboard',
	        		'client'	=> '/'
	        	);
	            
	            $this->redirect( isset($userPages[$type]) ? $userPages[$type] : $this->Auth->redirect());
	            
	        } else {
	            $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
	        }
	    }
	}
	
	public function admin_add() {
		
		$this->admin_edit(null);
	}	
	
	public function admin_edit($id)
	{
		if($this->request->is('post'))
		{
			
			if(!$id)
			{
				$this->request->data['User'] = am( $this->request->data['User'], array('registered_date' => date('Y-m-d H:i:s')));
			}
			else
			{
				if( $this->request->data['User']['password'] == '')
				{
					unset($this->request->data['User']['password']);
				}
			}
			
		
		    if ($this->User->save($this->request->data)) 
		    {
		    	
		    	
		        // $id = $this->User->id;
		        // $this->request->data['User'] = am($this->request->data['User'], array('id' => $id));
		        // $this->Auth->login($this->request->data['User']);
		        
		        $this->Session->setFlash( $id ? __('Saved successfully') : __('User created successfully'));
		        
		        $this->redirect('/admin/users/edit/'.$this->User->id);
		    }
		}
		else
		{
			$this->data = $id ? $this->User->read(null, $id ) : null;
		}		
		
	}
	
	public function logout() {
		
	    $this->redirect($this->Auth->logout());
	}	
	
	public function writer_dashboard() 
	{
		$this->paginate	=	array(
			'conditions'	=>	array(
				'WriterAssignment.status' => array(
					'pending', 
					'in_progress',
					'in_review'
				)
			),
			'limit'	=>	20,
			'recursive' => 3
		);
		
    	$assignments =	$this->paginate('WriterAssignment');		
		
		$this->set('assignments', $assignments);
	}
	
	public function manager_dashboard()
	{
		$this->paginate	= array(
			'conditions' =>	array(
				'WriterAssignment.manager_user_id' => $this->user['User']['id']
			),
			'limit'	=>	20,
			'recursive' => 3
		);
		
    	$assignments =	$this->paginate('WriterAssignment');		
		
		$this->set('assignments', $assignments);		
	}	
	
	
	public function admin_dashboard()
	{
		
	}
	
	public function admin_list()
	{
		$this->paginate	= array(
			'conditions' =>	array(
			),
			'limit'	=>	20,
			'recursive' => -1
		);
		
    	$users =	$this->paginate('User');		
		
		$this->set('users', $users);			
	}
	
	public function profile( $id = null )
	{
		$id = $id ? $id : $this->user['User']['id'];
		
		if( !($userData = $this->User->read(null, $id)) )
		{
			throw new CakeException();
		};
		
		$this->set('userData', $userData);
	}
}