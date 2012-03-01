<?php 

class Keyword extends AppModel
{
	public $validate = array(
		'keyword' => array(
			'empty'	=> array(
				'rule' => 'notEmpty'
			)
		)
	);
}