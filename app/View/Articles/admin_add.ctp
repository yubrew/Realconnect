<?php 

?>
<h1><?php echo __('Create an Article Order') ?></h1>
	


<?php if( !empty($this->validationErrors['Article']) || !empty($this->validationErrors['ArticleParagraph']) ){  ?>
<div class="alert alert-error">Please correct errors below : </div>
<?php } ?>


<?php 
	echo $this->Form->create('WriterAssignment', array('type' => 'post', 'class' => 'form-horizontal article-edit'));
	echo $this->Form->hidden('WriterAssignment.submit_for_review', array('value' => '0' )); 
	echo $this->Form->hidden('Article.id');

?>

<?php for($paragraphIndex = 0; $paragraphIndex < $paragraphsCount; $paragraphIndex++) { ?>
	
	<div id="paragraphBox<?php echo $paragraphIndex ?>">
	
		<?php $errorMessageForField	=	( $f = $this->Form->error('ArticleParagraph.'.$paragraphIndex.'.title', $paragraphTitleErrors ) ) ? $f : false;
		
		
		 ?>
		<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
				<label class="control-label" for="ArticleParagraph<?php echo $paragraphIndex ?>Title"><?php echo $fieldTitle = ( $paragraphIndex > 0 ) ? __('Heading ').$paragraphIndex : __('Title') ?></label>
				<?php echo $this->Form->input('ArticleParagraph.'.$paragraphIndex.'.title', array(
					'label'	=>	false,
					'class'	=>	'input-xxlarge',
					'div'	=>	array("class" => "controls"),
					'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ).( '<p class="help-block">'. $fieldTitle.' should have at least Five words and the keyword has to be mentioned once.</p>' ),
					'error'	=>	false,
					'type'	=> 'text'
				) ); ?>
				 
		</div>	
		
		<?php $errorMessageForField	=	( $f = $this->Form->error('ArticleParagraph.'.$paragraphIndex.'.content', $paragraphDescriptionErrors ) ) ? $f : false; ?>
		<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
				<label class="control-label" for="ArticleParagraph<?php echo $paragraphIndex ?>Content"><?php echo $fieldTitle = __('Paragraph ').($paragraphIndex+1) ?></label>
				<?php echo $this->Form->input('ArticleParagraph.'.$paragraphIndex.'.content', array(
					'label'	=>	false,
					'class'	=>	'input-xxlarge',
					'div'	=>	array("class" => "controls"),
					'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ).( '<p class="help-block">'.$fieldTitle.' should have at least '.$wordsPerParagraph.' quality words and the keyword has to be mentioned once.</p>' ),
					'error'	=>	false,
					'type'	=> 'textarea'
				)); ?>
		</div>	
		
		<?php echo $this->Form->hidden('ArticleParagraph.'.$paragraphIndex.'.order', array('value' => $paragraphIndex )) ?>		
		<?php echo $this->Form->hidden('ArticleParagraph.'.$paragraphIndex.'.id' ) ?>
		
	</div>	
	
<?php } ?>

<?php $errorMessageForField	=	( $f = $this->Form->error('Article.youtube_link', array('empty' => __('Link is empty' ) ) ) ) ? $f : false; ?>
<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
		<label class="control-label" for="ArticleYoutubeLink"><?php echo __('Youtube Link') ?></label>
		<?php echo $this->Form->input('Article.youtube_link', array(
			'label'	=>	false,
			'class'	=>	'input-xxlarge',
			'div'	=>	array("class" => "controls"),
			'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ).( '<p class="help-block">Youtube video should be in the niche you are writing about.</p>' ),
			'error'	=>	false,
			'type'	=> 'text'
		)); ?>
</div>	


<?php if($user['User']['type'] == 'writer'){ ?>
	<div class="form-actions">
		<?php
		echo $updateAllowed ? $this->Form->button(__('Save'), array(
				'label'	=>	false,
				'div'	=>	false,
				'class' => 'btn btn-primary',
				'type'	=>	'submit'
		)) : ''; 
		?>
		
		<?php echo $updateAllowed ? ( $this->Form->button(__('Submit For Review'), array(
				'label'	=> false,
				'div'	=> false,
				'class' => 'btn btn-danger',
				'type'	=> 'submit',
				'id'	=> 'SubmitForReview'
		) + ( $progressPercent >= 100 ? array() : array( 'disabled' => 'disabled' ) ) ) ): '';
														
		?>
		<?php echo $this->Html->link(__('Back to list'), '/writer/dashboard', array('class' => 'btn')); ?>
	</div>	
	
	</form>	
	<?php } else if( $user['User']['type'] == 'manager') { ?>
		</form>	
		<?php echo $this->Form->create('WriterArticleSubmit', array('type' => 'post', 'class' => 'form-horizontal manager-edit')); ?>
	
		<?php echo $this->Form->hidden('WriterArticleSubmit.id') ?>
		
		<?php $errorMessageForField	=	( $f = $this->Form->error('WriterArticleSubmit.manager_notes', array('empty' => __('Field is empty')) ) ) ? $f : false; ?>
		<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
				<label class="control-label" for="WriterArticleSubmitManagerNotes"><?php echo __('Notes')?></label>
				<?php echo $this->Form->input('WriterArticleSubmit.manager_notes', array(
					'label'	=>	false,
					'class'	=>	'input-xxlarge',
					'div'	=>	array("class" => "controls"),
					'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
					'error'	=>	false,
					'type'	=> 'textarea'
				)); ?>
		</div>			
	
		<div class="form-actions">	
		
			<?php if( $writerAssignment['WriterAssignment']['status'] == 'in_review' ){ ?>
		
			<?php echo $this->Form->submit('Accept', array(
				'name'	=> 'data[WriterArticleSubmit][status]',
				'class' => 'btn btn-success',
				'value'	=> 'accepted',
				'div'	=> false
			)); ?>
			<?php echo $this->Form->submit('Rewrite',array(
				'name'	=> 'data[WriterArticleSubmit][status]',
				'class' => 'btn btn-warning',
				'value'	=> 'rewrite',
				'div'	=> false
			)); ?>
			<?php echo $this->Form->submit('Decline', array(
				'name'	=> 'data[WriterArticleSubmit][status]',
				'class' => 'btn btn-danger',
				'value'	=> 'declined',
				'div'	=> false
			)); ?>
			
			<?php } ?>
		
			<?php echo $this->Html->link('Back to list', '/manager/dashboard', array('class' => 'btn')); ?>
		</div>		
		<?php echo $this->Form->end() ?>
	<?php } ?> 


