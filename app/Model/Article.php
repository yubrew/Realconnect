<?php

class Article extends AppModel
{

	public $hasMany = array(
		'ArticleParagraph' => array(
			'order'	=> array(
				'ArticleParagraph.order' => 'asc'
			)
		)
	);	
}