<?php

class WriterOrder extends AppModel
{
	public $belongsTo = array(
		'Order',
		'ArticleTemplate'
	);
	
	public $hasMany = array(
		'Keyword'
	);
}