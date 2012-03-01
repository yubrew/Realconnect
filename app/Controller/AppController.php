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
		'User'
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
	
}
