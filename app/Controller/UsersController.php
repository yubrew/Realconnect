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
	
	public function register() {
		
		if($this->request->is('post')){
			
			$this->request->data['User'] = am( $this->request->data['User'], array('registered_date' => date('Y-m-d H:i:s')));
		
		    if ($this->User->save($this->request->data)) {
		    	
		    	
		        $id = $this->User->id;
		        $this->request->data['User'] = am($this->request->data['User'], array('id' => $id));
		        $this->Auth->login($this->request->data['User']);
		        
		        $this->Session->setFlash(__('Registration was successfull'));
		        
		        $this->redirect('/users/home');
		    }
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
			'limit'	=>	10,
			'recursive' => 3
		);
		
    	$assignments =	$this->paginate('WriterAssignment');		
		
		$this->set('assignments', $assignments);
	}
	
	public function manager_dashboard()
	{
		$this->paginate	= array(
			'conditions' =>	array(
				'WriterAssignment.status' => array(
					'in_review'
				),
				'WriterAssignment.manager_user_id' => $this->user['User']['id']
			),
			'limit'	=>	10,
			'recursive' => 3
		);
		
    	$assignments =	$this->paginate('WriterAssignment');		
		
		$this->set('assignments', $assignments);		
	}	
	
	
}