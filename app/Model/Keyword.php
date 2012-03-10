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
	
	
	public function unpackKeywords($keywordsData, $keywordDataInitial = array())
	{
		
		$keywordsArray = explode("\n", $keywordsData);
		$cleanKeywords = array();
		
		$keywordDataArray = array();
		$keywordIndex = 0;
		
		foreach($keywordsArray as $kw)
		{
			$keyword = trim($kw);
			if($keyword != "")
			{
				$cleanKeywords[] = $keyword;
				$kwdata = array( 'keyword' => $keyword );
				
				if(!empty($keywordDataInitial[$keywordIndex]['id']))
				{
					$kwdata['id'] = $keywordDataInitial[$keywordIndex]['id'];
				}
				else
				{
					$kwdata['create_date'] = date('Y-m-d H:i:s');
				}
				
				$keywordDataArray[$keywordIndex] = $kwdata;
				
				$keywordIndex++;
			}
		}

		return $keywordDataArray ? $keywordDataArray : array() ;
		
		
		
	}
}