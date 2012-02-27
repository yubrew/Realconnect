<?php

class WriterAssignment extends AppModel
{
	public $belongsTo = array(
		'WriterOrder',
		'Manager' => array(
			'className'		=> 'User',
			'foreignKey'	=> 'manager_user_id'
		),
		'Writer' => array(
			'className'		=> 'User',
			'foreignKey'	=> 'writer_user_id'
		
		)
	);
	
	public $hasOne = array(
		'Article'
	);
}