<?php

$this->start('script');
echo $this->Html->script('atd/jquery.atd');
echo $this->Html->script('atd/jquery.atd.textarea');
echo $this->Html->script('atd/csshttprequest');
$this->end();
$this->start('css');
echo $this->Html->css('atd/atd');
$this->end(); 

$this->set( 'activeTopMenuItem','/manager/orders/list');

$now = time(); 

$assignmentStartTimestamp = strtotime($order['Order']['create_date']);
$secondsFromStart = $now - $assignmentStartTimestamp;
$orderDeliverySeconds = $order['OrderDeliveryOption']['delivery_hours'] * 3600 ;// seconds

$secondsLeft = $orderDeliverySeconds - $secondsFromStart;	



?>
<script type="text/javascript">
$(function(){
	
	$("textarea").autoResize({ extraSpace: 40 });
	
	// AtD.rpc_css = 'http://www.polishmywriting.com/atd-jquery/server/proxycss.php?data=';
	// AtD.rpc_css = "<?php echo $this->Html->url('/proxycss.php', true); ?>?data=";
	// $("#WriterOrderKeywords").addProofreader();
});		

</script>
<div class="well">
	<h1><?php echo __('Order details') ?> #<?php echo $order['Order']['id'] ?></h1>
	<br />
	<p><b>Client</b>: <?php echo h($order['Client']['username']) ?> &lt;<?php echo $order['Client']['email'] ?>&gt;</p>
	<p><b>Created</b>: <?php echo date( 'm/d/y H:i:s', strtotime( $order['Order']['create_date'])); ?></p>
	<p><b>Hours left</b>: <span class="<?php echo $secondsLeft > 0 ? 'deadline-not-passed' : 'deadline-passed' ?>"><?php echo  round($secondsLeft/3600) ?>h</span></p>
	<p><b>Delivery</b>: <?php echo $order['OrderDeliveryOption']['delivery_hours'].'h , '. $order['OrderDeliveryOption']['description'] ?>
	<p><b>Details</b>:<br /> <?php echo nl2br(h($order['Order']['details'])) ?></p>
	<p><b>Existing Assignments</b> ( total / in progress / completed ) : <?php echo $exisitngAssignmentsCount['total'].' / '.$exisitngAssignmentsCount['in_progress'].' / '.$exisitngAssignmentsCount['completed'] ?></p>
</div>



<div>
	<h2><?php echo __('Add a Writer Assignment') ?></h2>
	<br />
	<?php if( !empty($this->validationErrors['Article']) || !empty($this->validationErrors['ArticleParagraph']) ){  ?>
	<div class="alert alert-error">Please correct errors below : </div>
	<?php } ?>
	
	
	<?php 
		echo $this->Form->create('WriterAssignment', array('type' => 'post', 'class' => 'form-horizontal article-edit'));
		
		echo $this->Form->hidden('WriterAssignment.manager_user_id', array('value' => $user['User']['id']));
		echo $this->Form->hidden('WriterAssignment.create_date', array('value' => date('Y-m-d H:i:s')));
		echo $this->Form->hidden('WriterAssignment.writer_order_id', array('value' => $order['Order']['id']));
		
		echo $this->Form->hidden('WriterOrder.user_id', array('value' => $user['User']['id']));
		echo $this->Form->hidden('WriterOrder.order_id', array('value' => $order['Order']['id']));
		echo $this->Form->hidden('WriterOrder.create_date', array('value' => date('Y-m-d H:i:s')));
	
	?>
	
	<div class="control-group">
		<label class="control-label" for="WriterAssignmentWriterUserId"><?php echo __('Writer') ?></label>
		<div class="controls">
		<?php
				echo $this->Form->select('WriterAssignment.writer_user_id', $writers,
														array(
															'label'	=>	false,
															'empty'	=>	false,
															'class'	=>	'input-xlarge' 
													
															));
		?>
		</div>
	</div>
	


<?php $errorMessageForField	=	( $f = $this->Form->error('WriterOrder.description', array('empty' => __('Field is invalid' ) ) ) ) ? $f : false; ?>
<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
		<label class="control-label" for="WriterOrderDescription"><?php echo __('Manager Order description') ?></label>
		<?php echo $this->Form->input('WriterOrder.description', array(
			'label'	=>	false,
			'class'	=>	'input-xxlarge',
			'div'	=>	array("class" => "controls"),
			'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
			'error'	=>	false,
			'type'	=> 'textarea'
		)); ?>
</div>	

	<div class="control-group">
		<label class="control-label" for="WriterOrderArticleTemplateId"><?php echo __('Article Template') ?></label>
		<div class="controls">
		<?php echo $this->Form->select('WriterOrder.article_template_id', $articleTemplates, array( 'label' => false, 'empty' => false, 'class' => 'input-xlarge')); ?>
		</div>
	</div>

<h3>Keywords</h3>

<br />

<?php $errorMessageForField	=	( $f = $this->Form->error('WriterOrder.keywords', array('empty' => __('Field is invalid' ) ) ) ) ? $f : false; ?>
<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
		<label class="control-label" for="WriterOrderDescription"><?php echo __('Keywords, one per line') ?></label>
		<?php echo $this->Form->input('WriterOrder.keywords', array(
			'label'	=>	false,
			'class'	=>	'input-xxlarge',
			'div'	=>	array("class" => "controls"),
			'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
			'error'	=>	false,
			'type'	=> 'textarea'
		)); ?>
</div>	
		
	<div class="form-actions">	
	
		<?php echo $this->Form->submit('Add', array(
			'class' => 'btn btn-success',
			'value'	=> 'accepted',
			'div'	=> false
		)); ?>
		
		<?php // echo $this->Html->link('Back to Order', '/admin/orders/edit/'.$order['Order']['id'], array('class' => 'btn')); ?>
		<?php // echo $this->Html->link('Review existing assignments', '/admin/articles/list_by_order/'.$order['Order']['id'], array('class' => 'btn')); ?>
		
	</div>		
	<?php echo $this->Form->end() ?>	
</div>