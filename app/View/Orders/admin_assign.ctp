<?php 

?>
<h1><?php echo __('Add a Writer Assignment') ?></h1>
	
<div class="well">
	<h3>Order #<?php echo $order['Order']['id'] ?></h3>
</div>

<?php if( !empty($this->validationErrors['Article']) || !empty($this->validationErrors['ArticleParagraph']) ){  ?>
<div class="alert alert-error">Please correct errors below : </div>
<?php } ?>


<?php 
	echo $this->Form->create('WriterAssignment', array('type' => 'post', 'class' => 'form-horizontal article-edit'));
	echo $this->Form->hidden('WriterAssignment.manager_user_id', array('value' => $order['WriterOrder']['user_id']));
	echo $this->Form->hidden('WriterAssignment.create_date', array('value' => date('Y-m-d H:i:s')));
	echo $this->Form->hidden('WriterAssignment.writer_order_id', array('value' => $order['Order']['id']));

?>

<div class="control-group">
	<label class="control-label" for="WriterAssignmentWriterUserId"><?php echo __('Writer') ?></label>
	<div class="controls">
	<?php
			echo $this->Form->select('writer_user_id', $writers,
													array(
														'label'	=>	false,
														'empty'	=>	false,
														'class'	=>	'input-xlarge' 
												
														));
	?>
	</div>
</div>
	
<div class="form-actions">	

	<?php echo $this->Form->submit('Add', array(
		'class' => 'btn btn-success',
		'value'	=> 'accepted',
		'div'	=> false
	)); ?>
	
	<?php echo $this->Html->link('Back to Order', '/admin/orders/edit/'.$order['Order']['id'], array('class' => 'btn')); ?>
	<?php echo $this->Html->link('Review existing assignments', '/admin/articles/list_by_order/'.$order['Order']['id'], array('class' => 'btn')); ?>
	
</div>		
<?php echo $this->Form->end() ?>
 


