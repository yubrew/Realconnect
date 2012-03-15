<?php 



?>      
      <div class="hero-unit">
        <h1>Hello, world!</h1>
        <br />
        <p>The ordering process is really simple, all you need to do is fill out all the information below, and then click on the “submit your order” button, after that you will be redirected to the secured payment gateway from PayPal and purchase your articles. Shortly after that you will get an e-mail with details of your order, together with log in details for our Customer page!</p>
        
        
		  <div class="row">
		  	<?php 
		  	echo $this->Form->create('Order', array('type' => 'post', 'class' => 'form-horizontal article-edit')); 
		  	echo $this->Form->hidden('article_template_id', array('value' => 1 ));
		  	?>
		  	
		    <div class="span7">
		      <h2>Article details</h2>
		      <br />
		      
				<?php $errorMessageForField	=	( $f = $this->Form->error('User.username', array('empty' => __('Name is empty' ) ) ) ) ? $f : false; ?>
				<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
						<label class="control-label" for="UserUsername"><?php echo __('Name') ?></label>
						<?php echo $this->Form->input('User.username', array(
							'label'			=>	false,
							'class'			=>	'input-large',
							'div'			=>	array("class" => "controls"),
							'after'			=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
							'placeholder'	=> __('Enter your name'),
							'error'			=>	false,
							'type'			=> 'text'
						)); ?>
				</div>			      

				<?php $errorMessageForField	=	( $f = $this->Form->error('User.email', array('empty' => __('Email is empty' ), 'unique' => __('Email is already taken') ) ) ) ? $f : false; ?>
				<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
						<label class="control-label" for="UserEmail"><?php echo __('Email') ?></label>
						<?php echo $this->Form->input('User.email', array(
							'label'			=>	false,
							'class'			=>	'input-large',
							'div'			=>	array("class" => "controls"),
							'after'			=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
							'placeholder'	=> __('Your email ( for delivery )'),
							'error'			=>	false,
							'type'			=> 'text'
						)); ?>
				</div>		
				
				<?php $errorMessageForField	=	( $f = $this->Form->error('Order.articles_count', array('empty' => __('Please provide a numeric amount') , 'range' => __('The minimum order is 5 articles' ) ) ) ) ? $f : false; ?>
				<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
						<label class="control-label" for="OrderArticlesCount"><?php echo __('Number of articles') ?></label>
						<?php echo $this->Form->input('Order.articles_count', array(
							'label'			=>	false,
							'class'			=>	'input-large',
							'div'			=>	array("class" => "controls"),
							'after'			=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ).( '<p style="font-size:12px" class="help-block">The minimum order is 5 articles.</p>' ),
							'placeholder'	=> __('Number of articles'),
							'error'			=>	false,
							'type'			=> 'text'
						)); ?>
				</div>			
				
				<?php $errorMessageForField	=	( $f = $this->Form->error('Order.details', array('empty' => __('Field is empty')) ) ) ? $f : false; ?>
				<div class="control-group <?php echo $errorMessageForField ? "error" : ""; ?>">
						<label class="control-label" for="OrderDetails"><?php echo __('Details')?></label>
						<?php echo $this->Form->input('Order.details', array(
							'label'			=>	false,
							'class'			=>	'input-xxlarge',
							'div'			=>	array("class" => "controls"),
							'after'			=>	( $errorMessageForField ? '<span class="help-inline">'.$errorMessageForField.'</span>' : '' ),
							'placeholder'	=> __('Paste here your detail for the order, keywords for your articles and similar information.'),							
							'error'			=>	false,
							'style'			=> 'width:500px',
							'type'			=> 'textarea'
						)); ?>
				</div>					


		      	<div class="control-group">
		      		<label class="control-label"><?php echo __('Delivery Time') ?></label>
		      		<div class="controls">
			
				      <?php if( count($deliveryOptions)> 1 ){ $defaultId = 0; ?>
				      		<?php foreach($deliveryOptions as $i => $deliveryOption){?>
				      		<label class="radio" for="OrderOrderDeliveryOptionId<?php echo $deliveryOptions[$i]['OrderDeliveryOption']['id'] ?>">
				      			<?php echo $this->Form->radio('Order.order_delivery_option_id', array($deliveryOptions[$i]['OrderDeliveryOption']['id'] => '') , array('type' => 'radio', 'div' => false, 'label' => false, 'checked' => true)); ?>
				      			<b style="font-weight:bold"><?php echo $deliveryOptions[$i]['OrderDeliveryOption']['delivery_hours'] ?>h</b> - <?php echo h($deliveryOptions[$i]['OrderDeliveryOption']['description']);  ?> 
				      		</label>
				      		<?php } ?>
				      <?php } else { 
				      	echo $this->Form->hidden('Order.order_delivery_option_id', array('value' => $deliveryOptions[0]['OrderDeliveryOption']['id']));
				      	?>
				       	<p style="font-size:14px;"><b style="font-weight:bold"><?php echo $deliveryOptions[0]['OrderDeliveryOption']['delivery_hours'] ?>h</b> - <?php echo h($deliveryOptions[0]['OrderDeliveryOption']['description']); ?></p>
				      <?php } ?>
				      
		      		</div>
		      	</div>	
				      						      

		      	<div class="form-actions">	
				<?php
				echo $this->Form->button(__('Submit your order'), array(
						'label'	=>	false,
						'div'	=>	false,
						'class' => 'btn btn-success',
						'type'	=>	'submit'
				)); 
				?>			      
				</div>
		      
		      
		      	
		       
		       
		       
		      
		    </div>
		    
		    <div class="span3">
		      <h2>Delivery</h2>

		      <p> Description </p>
		     
		    </div>
		    
		    <?php echo $this->Form->end() ?>	
		    
		  </div>        
        
        
      </div>

      
