<?php

class User extends AppModel
{
	public $validate = array(
		'username' => array(
			'empty'	=> array(
				'rule' => 'notEmpty'
			),
			'unique' => array(
				'rule' => 'isUnique'
			)
		),
		'password' => array(
			'empty' => array(
				'rule' => 'notEmpty'
			)
		),
		'email'	=> array(
			'empty' => array(
				'rule' => 'email'
			),
			'unique' => array(
				'rule' => 'isUnique'
			)
		)
		
	);
	
    public function beforeSave($options = array()) {
    	if(isset($this->data['User']['password'])){
    	
        	$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    	}
        return true;
    }	
}
