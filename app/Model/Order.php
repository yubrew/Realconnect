<?php

class Order extends AppModel
{
	public $belongsTo = array(
		'OrderDeliveryOption'
	);
}