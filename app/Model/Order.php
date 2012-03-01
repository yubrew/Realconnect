<?php

class Order extends AppModel
{
	public $belongsTo = array(
		'OrderDeliveryOption',
		'Client' => array(
			'className' 	=> 'User',
			'foreignKey'	=> 'user_id'
		)		
	);
	
	public $validate = array(
		'details' => array(
			'empty' => 'notEmpty'
		),
		'articles_count' => array(
			'empty'	=> 'numeric'
		)
	);
	

}