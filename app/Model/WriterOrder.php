<?php

class WriterOrder extends AppModel
{
	public $belongsTo = array(
		'Order',
		'ArticleTemplate',
		'Manager' => array(
			'className'	 => 'User',
			'foreignKey' => 'user_id'
		)
	);
	
	public $hasMany = array(
		'Keyword'
	);
	
	public $validate = array(
		'description' => array(
			'empty' => 'notEmpty'
		)

	);	
	
}