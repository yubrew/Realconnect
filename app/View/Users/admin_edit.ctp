<?php $this->set( 'activeTopMenuItem','/admin/users/list'); ?>
<div>
	<h1><?php echo __('Edit a User #%s', $this->data['User']['id']) ?></h1>
	
	<?php echo $this->Form->create('User', array('type' => 'post', 'class' => 'form-horizontal')); ?>
	<?php echo $this->Form->hidden('id'); ?>
	<legend><?php echo __('All fields are mandatory') ?></legend>
	<?php $errorMessageForField	=	( $f = $this->Form->error('User.email', array('empty' => __('Email is invalid'), 'unique' => __('Email is already taken' ) ) ) ) ? $f : null; ?>
	<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
			<label class="control-label" for="UserEmail"><?php echo __('Email:') ?></label>
			<?php echo $this->Form->input("email", array(
															'label'	=>	false,
															'class'	=>	'input-xlarge',
															'div'	=>	array("class" => "controls"),
															'after'	=>	( ($errorMessageForField) ? '<span class="help-inline">'.$errorMessageForField.'</span>' : "" ),
															'error'	=>	false)); ?>
	</div>

	<?php $errorMessageForField	=	( $f = $this->Form->error('User.username', array('empty' => __('Username is invalid'), 'unique' => __('Username is already taken' ) ) ) ) ? $f : null; ?>
	<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
			<label class="control-label" for="UserUsername"><?php echo __('Username:') ?></label>
			<?php echo $this->Form->input("username", array(
															'label'	=>	false,
															'class'	=>	'input-xlarge',
															'div'	=>	array("class" => "controls"),
															'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : "" ),
															'error'	=>	false)); ?>
	</div>

	<div class="control-group">
		<label class="control-label" for="NewsStatus"><?php echo __('Type:') ?></label>
		<div class="controls">
		<?php
				echo $this->Form->select("type", array( 'admin' => __('Admin'), 'writer' => __('Writer'), 'client' => __('Client'), 'manager' => __('Manager') ),
														array(
															'label'	=>	false,
															'empty'	=>	false,
															'class'	=>	'input-xlarge', 
															));
														?>
		</div>
	</div>

	<?php $errorMessageForField	=	( $f = $this->Form->error('User.password', array('empty' => __('Password is empty') ) ) ) ? $f : null; ?>
	<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
			<label class="control-label" for="UserPassword"><?php echo __('Password:') ?></label>
			<?php echo $this->Form->input("password", array(
															'label'	=>	false,
															'class'	=>	'input-xlarge',
															'div'	=>	array("class" => "controls"),
															'after'	=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : "" ),
															'error'	=>	false,
															'type'	=> 'password',
															'value'	=> '')); ?>
	</div>
	
	
	
	<div class="form-actions">
	<?php 					echo $this->Form->button('Edit', array(
															'label'	=>	false,
															'div'	=>	false,
				    										'class' => 'btn btn-primary',
															'type'	=>	'submit'
													)); 
	?>
	</div>
	 
</div>