<?php

class Order extends AppModel
{
	public $belongsTo = array(
		'OrderDeliveryOption',
		'Client' => array(
			'className' 	=> 'User',
			'foreignKey'	=> 'user_id'
		),
		'ArticleTemplate'
	);
	
	public $validate = array(
		'details' => array(
			'empty' => 'notEmpty'
		),
		'articles_count' => array(
			'empty'	=> array(
				'rule' => 'numeric'
			),
			'range'	=> array(
				'rule'	=> array('range', 4 , 1000000 )
			)
		)
	);
	
	/**
	 * Update the validation rule with min and max articles
	 * $min and $max are inclusive
	 */
	function setArticleCountsRange($min, $max)
	{
		$this->validate['articles_count']['range']['rule'][1] = $min-1;
		$this->validate['articles_count']['range']['rule'][2] = $max+1;
	}

}