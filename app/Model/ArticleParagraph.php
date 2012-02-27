<?php

class ArticleParagraph extends AppModel
{
	var $validate = array(
		'title' => array(
			'empty' => array(
				'rule' => 'notEmpty'
			),
			'wordsCount' => array(
				'rule'	=> array( 'minWordsCount', 5 )
			)
		),
		'content' => array(
			'empty' => array(
				'rule' => 'notEmpty'
			)
		)
	);
	
	
	
	public function minWordsCount( $check, $countWords )
	{
		return jsphp_str_word_count( reset($check) ) >= $countWords;
	}
	
	public function setTitleValidationWordsCount($countWords)
	{
		$this->validate['title']['wordsCount']['rule'][1] = $countWords;
	}
	
}