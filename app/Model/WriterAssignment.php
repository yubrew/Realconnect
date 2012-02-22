<?php

class WriterAssignment extends AppModel
{
	public $belongsTo = array(
		'WriterOrder'
	);
	
	public $hasOne = array(
		'Article'
	);
}