<?php

class ArticlesController extends AppController
{
	public $uses = array(
		'WriterAssignment',
		'WriterArticleSubmit',
		'Article'
	);
	
	
	function manager_review( $writerAssignemnetId, $writerArticleSubmitId = null )
	{
		$writerArticleSubmits = array();
		if( $writerArticleSubmitId )
		{
			$writerArticleSubmits['conditions'] = array('WriterArticleSubmit.id' => $writerArticleSubmitId);
		}
		
		$this->WriterAssignment->bindModel(array('hasMany' => array('WriterArticleSubmit' => $writerArticleSubmits)));
		
		if( !($writerAssignment = $this->WriterAssignment->find('first', array(
			'conditions' => array(
				'WriterAssignment.manager_user_id' => $this->user['User']['id'],
				'WriterAssignment.id' => $writerAssignemnetId
			),
			'recursive' => 3
		))))
		{
			throw new NotFoundException();
		}
		
		$statuses = array( 'Accept' => 'accepted', 'Decline' => 'declined', 'Rewrite' => 'rewrite');
		$writerArticleSubmit = !empty( $writerAssignment['WriterArticleSubmit'] ) ? $writerAssignment['WriterArticleSubmit'][ count($writerAssignment['WriterArticleSubmit']) -1 ] : null; 
		
		
		if( $this->request->is('post') && ( $writerAssignment['WriterAssignment']['status'] == 'in_review' ) )
		{
			
			$data = $this->request->data;
			$data['WriterArticleSubmit']['status'] = $action =  $statuses[ $data['WriterArticleSubmit']['status'] ];
			
			if($this->WriterArticleSubmit->save($data))
			{
				$this->WriterAssignment->id = $writerAssignemnetId;
			
				if($action == 'declined')
				{
					$this->WriterAssignment->save(array('completed_date' => date('Y-m-d H:i:s'), 'status' => 'rejected'));
				}
				else if($action == 'accepted')
				{
					$this->WriterAssignment->save(array('completed_date' => date('Y-m-d H:i:s'), 'status' => 'completed'));
				}
				else if($action == 'rewrite')
				{
					$this->WriterAssignment->save(array('completed_date' => null, 'status' => 'in_progress'));
					$this->sendRewriteArticleNotification($writerAssignemnetId);
					
				}
				
				$this->Session->setFlash(__('Status has been saved'));
				
				
				
				$this->redirect('/manager/articles/review/'.$writerAssignemnetId.'/'.$this->WriterArticleSubmit->id);
					
			}
			
				
			
			
		}
		else
		{

			$this->data = array(
				'Article' => $writerAssignment['Article'], 
				'ArticleParagraph' => empty($writerAssignment['Article']['ArticleParagraph']) ? array() : $writerAssignment['Article']['ArticleParagraph'],
				'WriterArticleSubmit' => $writerArticleSubmit
			);
			
		}			
		
		$this->set('writerAssignment', $writerAssignment);
		
		$this->render('writer_edit');
	}
	
	function writer_edit($writerAssignemnetId)
	{

		
		if( !($writerAssignment = $this->WriterAssignment->find('first', array(
			'conditions' => array(
				'WriterAssignment.writer_user_id' => $this->user['User']['id'],
				'WriterAssignment.id' => $writerAssignemnetId
			),
			'recursive' => 3
		))))
		{
			throw new NotFoundException();
		}
		
		
		
		if( $this->request->is('post') && in_array( $writerAssignment['WriterAssignment']['status'], array( 'pending','in_progress' ) ) )
		{
			// prefill data
			if(empty($writerAssignment['Article']['id']))
			{
				$this->request->data = am($this->request->data,  array( 
					'Article' => array(
						'create_date' 			=> date('Y-m-d H:i:s'),
						'writer_assignment_id' 	=> $writerAssignemnetId,
						'user_id' 				=> $this->user['User']['id']
				)));
			}
			
			// setup validation rules
			$this->Article->ArticleParagraph->setTitleValidationWordsCount($writerAssignment['WriterOrder']['ArticleTemplate']['paragraph_title_words_count']);
			
			
			
			if( $result = $this->Article->saveAssociated($this->request->data, array('validate' => 'first')) )
			{
				$this->WriterAssignment->id = $writerAssignemnetId;
				
				
				// writer submits an article for review
				if( !empty($this->data['WriterAssignment']['submit_for_review']) )
				{
					$this->WriterAssignment->saveField('status', 'in_review');
					
					$this->submitForReview($writerAssignemnetId);
					
					$this->Session->setFlash(__('Artice was submitted for review'));
				}
				else
				{
					$this->Session->setFlash(__('Article was saved successfully'));
					$this->WriterAssignment->saveField('status','in_progress');
				}
				
				$this->redirect('/writer/articles/edit/'.$writerAssignemnetId);
			}
			
			
			
		}
		else
		{

			$this->data = array(
				'Article' => $writerAssignment['Article'], 
				'ArticleParagraph' => empty($writerAssignment['Article']['ArticleParagraph']) ? array() : $writerAssignment['Article']['ArticleParagraph'] 
			);
			
		}
		
		$this->set('writerAssignment', $writerAssignment);
		
	}
	
	public function export($writerAssignemnetId)
	{
		
		
		if( !($writerAssignment = $this->WriterAssignment->find('first', array(
			'conditions' => array(
				'WriterAssignment.manager_user_id' => $this->user['User']['id'],
				'WriterAssignment.id' => $writerAssignemnetId
			),
			'recursive' => 3
		))))
		{
			throw new NotFoundException();
		}
		
		if( App::import('Vendor', 'TransformDoc', array('file' => 'phpwordtemplate'.DS.'DocxTemplate.php')) )
		{

			
		    $this->viewClass = 'Media';
		    
		    $tempFilename = tempnam(sys_get_temp_dir(), 'article_export_');
		    
		    $filename = 'article-'.$writerAssignemnetId.'-'.date('Ymd');
		    $extension = 'docx';
		    
			
			$templatePath = ROOT . DS . 'app' . DS . 'View'.DS.'Articles'.DS.'docx'.DS. $writerAssignment['WriterOrder']['ArticleTemplate']['template_file'] ;
			
			$template = new DocxTemplate( $templatePath, dirname($tempFilename) );
			
			if( $template )
			{
				$flatData = Set::flatten( $writerAssignment );
				// var_dump( $flatData );exit;
				foreach($flatData as $k => $v)
				{
					$template->setValue( $k, $v );
				}
				
				
				$template->save($tempFilename);
			    
			    // Render app/webroot/files/example.docx
			    $params = array(
			        'id'        => basename($tempFilename),
			        'name'      => $filename,
			        'extension' => $extension,
			        'download'  => true,
			        'mimeType'  => array(
			            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
			        ),
			        'path'      => dirname($tempFilename). DS
			    );
			    $this->set($params);		
			}
			else
			{
				throw new CakeException('docx template not found : '.$templatePath);
			}
		
		}
		else
		{
			throw new CakeException('Php doc Vendor not found');
		}
				
	}
	
	public function manager_list()
	{
		
	}
	
	
	private function submitForReview($writerAssignemnetId)
	{
		$this->WriterAssignment->recursive = 2;
		
		if( $writerAssignment = $this->WriterAssignment->read(null, $writerAssignemnetId))
		{		
			$this->WriterArticleSubmit->create(array(
				'writer_assignment_id'	=> $writerAssignemnetId,
				'create_date'			=> date('Y-m-d H:i:s'),
				'status'				=> 'submited'
			));
			$this->WriterArticleSubmit->save();
		
			$this->set('articleNotificationId', $this->WriterArticleSubmit->id );
		
			
			try
			{
				// email the manager
				$email = new CakeEmail();
				$subject = __('Writer has submitted an article');
				$email->from( Configure::read('Email.noreplyAddress'));
				$email->template('writer_submits_article');
				$email->to( $writerAssignment['Manager']['email'] );
				$email->subject( $subject );
				$email->send();
			}
			catch(CakeException $e)
			{
				
			}
			
			return true;
		}
		
		return false;
		
	}
	
	private function sendRewriteArticleNotification($writerAssignemnetId)
	{
		$this->WriterAssignment->recursive = 2;
		
		if( $writerAssignment = $this->WriterAssignment->read(null, $writerAssignemnetId))
		{		
		
			$this->set('writerAssignment', $writerAssignment );
		
			
			try
			{
				// email the manager
				$email = new CakeEmail();
				$subject = __('Your article requires a rewrite');
				$email->from( Configure::read('Email.noreplyAddress'));
				$email->template('writer_rewrite_article');
				$email->to( $writerAssignment['Writer']['email'] );
				$email->subject( $subject );
				$email->send();
			}
			catch(CakeException $e)
			{
				
			}
			
			return true;
		}
		
		return false;		
	}
	
	
	
}
