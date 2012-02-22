<h1>Login</h1>

<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        
		<?php 
		$flashMessage = $this->Session->flash('auth');
		if($flashMessage){ ?>
			<div class="alert alert-error fade in">
				<a class="close" data-dismiss="alert" href="#">×</a>
				<?php echo $flashMessage; ?>
			</div>
		<?php } ?>
        
        
		<div class="control-group">
				<label class="control-label" for="UserEmail"><?php echo __('Email:') ?></label>
				<?php echo $this->Form->input('email', array(
																'label'	=>	false,
																'class'	=>	'input-xlarge',
																'div'	=>	array("class" => "controls"),
																'error'	=>	false)); ?>
		</div>        
		<div class="control-group">
				<label class="control-label" for="UserPassword"><?php echo __('Password:') ?></label>
				<?php echo $this->Form->input('password', array(
																'label'	=>	false,
																'class'	=>	'input-xlarge',
																'div'	=>	array("class" => "controls"),
																'error'	=>	false)); ?>
		</div>        
        
    <?php
        
        
    ?>
    </fieldset>
    
	<div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo __('Login') ?></button>
           </div>    
    
	<?php echo $this->Form->end();?>


