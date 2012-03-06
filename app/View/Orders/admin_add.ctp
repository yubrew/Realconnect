<?php 

$this->set( 'activeTopMenuItem','/admin/orders/list');

$this->start('script');
echo $this->Html->script('atd/jquery.atd');
echo $this->Html->script('atd/jquery.atd.textarea');
echo $this->Html->script('atd/csshttprequest');
$this->end();
$this->start('css');
echo $this->Html->css('atd/atd');
$this->end();

 ?>
<script type="text/javascript">
$(function(){
	
	$("textarea").autoResize({ extraSpace: 40 });
	
	// AtD.rpc_css = 'http://www.polishmywriting.com/atd-jquery/server/proxycss.php?data=';
	AtD.rpc_css = "<?php echo $this->Html->url('/proxycss.php', true); ?>?data=";
	$("#WriterOrderKeywords").addProofreader();
});		

</script>
<h1><?php echo __('Create an Order') ?></h1>
	
<br />

<?php if( !empty($this->validationErrors['Order']) || !empty($this->validationErrors['WriterOrder']) || !empty($this->validationErrors['WriterOrder']) ){  ?>
<div class="alert alert-error"><?php echo __('Please correct errors below :') ?></div>
<?php } ?>


<?php 
	echo $this->Form->create('Order', array('type' => 'post', 'class' => 'form-horizontal article-edit'));
	echo $this->Form->hidden('WriterOrder.create_date', array('value' => date('Y-m-d H:i:s')));
	echo $this->Form->hidden('Order.create_date', array('value' => date('Y-m-d H:i:s')));
	echo $this->Form->hidden('Order.id');
	echo $this->Form->hidden('WriterOrder.id');
?>

	<div class="control-group">
		<label class="control-label" for="OrderUserId"><?php echo __('Client') ?></label>
		<div class="controls">
		<?php
				echo $this->Form->select('user_id', $clients,
														array(
															'label'	=>	false,
															'empty'	=>	false,
															'class'	=>	'input-xlarge', 
															));
		?>
		</div>
	</div>

<?php $errorMessageForField	=	( $f = $this->Form->error('Order.articles_count', array('empty' => __('Field is invalid' ), 'range' => __('There should be at least 5 articles') ) ) ) ? $f : false; ?>
<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
		<label class="control-label" for="OrderArticlesCount"><?php echo __('Articles count') ?></label>
		<?php echo $this->Form->input('Order.articles_count', array(
			'label'	=>	false,
			'class'	=>	'input-large',
			'div'	=>	array("class" => "controls"),
			'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
			'error'	=>	false,
			'type'	=> 'text'
		)); ?>
</div>	

<?php $errorMessageForField	=	( $f = $this->Form->error('Order.details', array('empty' => __('Field is invalid' ) ) ) ) ? $f : false; ?>
<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
		<label class="control-label" for="OrderDetails"><?php echo __('Client Order details') ?></label>
		<?php echo $this->Form->input('Order.details', array(
			'label'	=>	false,
			'class'	=>	'input-xxlarge',
			'div'	=>	array("class" => "controls"),
			'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
			'error'	=>	false,
			'type'	=> 'textarea'
		)); ?>
</div>	

	<div class="control-group">
		<label class="control-label" for="OrderOrderDeliveryOptionId"><?php echo __('Delivery options') ?></label>
		<div class="controls">
		<?php
				echo $this->Form->select('order_delivery_option_id', $deliveryOptions,
														array(
															'label'	=>	false,
															'empty'	=>	false,
															'class'	=>	'input-xlarge', 
															));
														?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="WriterOrderUserId"><?php echo __('Manager') ?></label>
		<div class="controls">
		<?php
				echo $this->Form->select('WriterOrder.user_id', $managers,
														array(
															'label'	=>	false,
															'empty'	=>	false,
															'class'	=>	'input-xlarge', 
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
		<?php
				echo $this->Form->select('WriterOrder.article_template_id', $articleTemplates,
														array(
															'label'	=>	false,
															'empty'	=>	false,
															'class'	=>	'input-xlarge', 
															));
		?>
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

<?php /*

<?php for($i=0; $i<10; $i++){ $fieldName = 'WriterOrder.Keyword.'.$i.'.keyword'; ?>
	<?php echo $this->Form->hidden('WriterOrder.Keyword.'.$i.'.create_date', array('value' => date('Y-m-d H:i:s'))) ?>
	<?php $errorMessageForField	=( $f = $this->Form->error($fieldName, array('empty' => __('Field is empty' ) ) ) ) ? $f : false; ?>
	<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
			<label class="control-label" for="WriterOrderKeyword<?php echo $i ?>Keyword"><?php echo __('Keyword') ?></label>
			<?php echo $this->Form->input($fieldName, array(
				'label'	=>	false,
				'class'	=>	'input-xlarge',
				'div'	=>	array("class" => "controls"),
				'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
				'error'	=>	false,
				'type'	=> 'text'
			)); 
			?>
			
	</div>
<?php } ?>

*/ ?>

<div class="form-actions">
		<?php
		echo $this->Form->button(__('Create'), array(
				'label'	=>	false,
				'div'	=>	false,
				'class' => 'btn btn-primary',
				'type'	=>	'submit'
		)); 
		?>

</div>	
	
	
<?php echo $this->Form->end() ?>
 


