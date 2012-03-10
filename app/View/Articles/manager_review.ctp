<?php 

$this->start('script');
echo $this->Html->script('atd/jquery.atd');
echo $this->Html->script('atd/jquery.atd.textarea');
echo $this->Html->script('atd/csshttprequest');
$this->end();
$this->start('css');
echo $this->Html->css('atd/atd');
$this->end();

$paragraphsCount = $writerAssignment['WriterOrder']['ArticleTemplate']['paragraphs_count'];

$wordsTotal = $writerAssignment['WriterOrder']['ArticleTemplate']['words_count'];

$wordsPerParagraph = round( $wordsTotal / $paragraphsCount);

$paragraphTitleErrors = array(
	'empty' 		=> __('Field is empty'),
	'wordsCount'	=> __('There should be at least %s words', $writerAssignment['WriterOrder']['ArticleTemplate']['paragraph_title_words_count'])
);

$paragraphDescriptionErrors = array(
	'empty' => __('Field is empty') 
); 



$wordsCount = 0;
if(!empty($this->data['ArticleParagraph']))
{
	foreach($this->data['ArticleParagraph'] as $p)
	{
		$wordsCount += jsphp_str_word_count($p['content']);
	}
}

$progressPercent = $wordsTotal > 0 ?  min(100, 100*$wordsCount/$wordsTotal ) : 0;

$updateAllowed = false;

$updateAllowed = in_array( $writerAssignment['WriterAssignment']['status'], array( 'pending','in_progress','in_review' ) );


?>
<script type="text/javascript">

$(function(){ 
	
	var wordsPerParagraph = <?php echo $wordsPerParagraph ?>;
	var wordsPerArticle = <?php echo $wordsTotal ?>;
	var graceContentChangeIntervalTime = 500; // ms
	var graceContentChangeInterval = null;
	var jParagraphContentTextareas = $('textarea[id^="ArticleParagraph"][id$="Content"]');
	var completeMeter = $("#completeMeter");
	var jSubmitForReviewButton = $("#SubmitForReview");
	var jSubmitForReviewHiddenInput = $("#WriterAssignmentSubmitForReview");
	

	
	$("textarea").autoResize({ extraSpace: 40 });
	

	
	<?php if(!$updateAllowed){ ?>
		
	$("form.article-edit input:text,form.article-edit textarea").attr("readonly","readonly");
	$("form.article-edit").submit( function(){ return false; });
	$("form.article-edit p.help-block").hide();
	
	<?php } else { ?>
		
	
	
	function progressCheck(){
		
		var wordsCount = 0;
		jParagraphContentTextareas.each( function(){
			wordsCount += phpjs.str_word_count( $(this).val(), 0, "-123456" );
		});
		
		try
		{
			percent = 100*wordsCount / wordsPerArticle;
		}
		catch(e)
		{
			percent = 0;
		}
		
		percent = Math.min( percent,100);
		
		if( percent >= 100 )
		{
			jSubmitForReviewButton.removeAttr("disabled");
		}
		else
		{
			jSubmitForReviewButton.attr("disabled", "disabled");
		}
		
		
		$( ".percent", completeMeter).text( Math.round( percent ) + "%");
		
		$( ".words_count", completeMeter).text( wordsCount );
		
		$(".bar").css("width", percent+"%");
	}


	
	jSubmitForReviewButton.click( function(){
		jSubmitForReviewHiddenInput.val("1");
		return true;
	});
	
	jParagraphContentTextareas.keyup( function(){
			if( graceContentChangeInterval ){
				clearTimeout(graceContentChangeInterval);
			}
			setTimeout(progressCheck, graceContentChangeIntervalTime );
		}
	);		
		
	// AtD.rpc_css = 'http://www.polishmywriting.com/atd-jquery/server/proxycss.php?data=';
	AtD.rpc_css = "<?php echo $this->Html->url('/proxycss.php', true); ?>?data=";
	$("form.article-edit input:text,form.article-edit textarea").addProofreader();			
		
		
	<?php } ?>
	
});

</script>

<div id="articleEditPage">

<div class="well">

	<h1>Article #<?php echo $writerAssignment['WriterAssignment']['id'] ?>
	
	

	
	<span style="position:relative; top:-7px;">
	<?php if($writerAssignment['WriterAssignment']['status'] == 'pending'){ ?>
		<span class="label"><?php echo __('In Progress') ?></span>
	<?php } else if($writerAssignment['WriterAssignment']['status'] == 'in_progress'){ ?>
		<span class="label"><?php echo __('In Progress') ?></span>	
	<?php } else if($writerAssignment['WriterAssignment']['status'] == 'in_review'){ ?>
		<span class="label label-warning"><?php echo __('In Review') ?></span>
	<?php } else if($writerAssignment['WriterAssignment']['status'] == 'completed'){ ?>
		<span class="label label-success"><?php echo __('Completed') ?></span>
	<?php } else if($writerAssignment['WriterAssignment']['status'] == 'rejected'){ ?>
		<span class="label label-important"><?php echo __('Rejected') ?></span>		
	<?php } ?>	
	</span>

	</h1>
	
	<h2>Order #<?php echo $writerAssignment['WriterOrder']['Order']['id'] ?></h2>
	
	<?php if($writerAssignment['WriterAssignment']['status'] == 'completed'){ ?>
	<p><?php echo $this->Html->link( __('Export'), '/articles/export/'.$writerAssignment['WriterAssignment']['id']) ?></p>
	<?php } ?>		

	<?php if(!empty($writerAssignment['WriterOrder']['Keyword'])){ ?>
	
	<p><?php echo $wordsTotal ?> words</p>
		
	<h4>Keywords</h4>
	
	<?php 
	
	$keywords = Set::extract( '/WriterOrder/Keyword/keyword', $writerAssignment );
	foreach($keywords as $i => $keyword)
	{
		$keywords[$i] = '<span class="label label-info">'.h( $keyword ).'</span>';
	}
	
	?>
	<p><?php echo ( join(' ', $keywords) ) ?></p>
	
	<?php } ?>
	<h4>Description</h4>
	<p><?php echo h($writerAssignment['WriterOrder']['description']) ?></p>
	
	
	<h4>Progress</h4>
	
	
	<div style="width:90%" id="completeMeter">
		<div class="progress-text">
			<span class="percent"><?php echo round( $progressPercent ) ?>%</span>
			<span class="words_count"><?php echo $wordsCount ?></span> /
			<span class="words_per_article"><?php echo $wordsTotal ?></span>
		</div>
		<div class="progress progress-info progress-striped">
		  <div class="bar"
		       style="width: <?php echo $progressPercent ?>%;"></div>
		</div>
	</div>
	
	
	<?php if( !empty($this->data['WriterArticleSubmit']['id'])){ ?>
	<h4>Article Status</h1>
	<?php echo __('Submitted at ').date('H:i:s m/d/Y ', strtotime( $this->data['WriterArticleSubmit']['create_date']) ).__(' by ').$writerAssignment['Writer']['username'] ?>
	<?php } ?> 

	
</div>

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
			

	<?php if($this->data['WriterArticleSubmit']['id']){ ?>
	
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

	<?php } ?>

	<div class="form-actions">	
	
		<?php
		echo $updateAllowed ? $this->Form->button(__('Save'), array(
				'label'	=>	false,
				'div'	=>	false,
				'class' => 'btn btn-primary',
				'type'	=>	'submit'
		)) : ''; 
		?>			
	
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



</div>
