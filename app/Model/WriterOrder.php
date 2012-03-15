<?php

class WriterOrder extends AppModel
{
	public $belongsTo = array(
		'Order',
		'Manager' => array(
			'className'	 => 'User',
			'foreignKey' => 'user_id'
		)
	);
	
	public $hasMany = array(
		'Keyword' => array(
			'order' => 'Keyword.id ASC'
		)
	);
	
	public $validate = array(
		'description' => array(
			'empty' => 'notEmpty'
		)

	);	
	
}