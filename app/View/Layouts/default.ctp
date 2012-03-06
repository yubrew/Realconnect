<?php

?><!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');

		// echo $this->Html->css('cake.generic');
		
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('display');
		echo $this->fetch('css');

		
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('jquery-ui.min');
		echo $this->Html->script('autoresize.jquery.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('phpjs.custom.min');
		
		
	?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<?php 
	echo $this->Html->script('global');
	echo $this->fetch('script');
	 ?>
    <!-- Le fav and touch icons -->
    <!--
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    -->	
	
</head>
<body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php echo $this->Html->link('Realconnect','/',array('class' => 'brand')) ?>
          
          <div class="nav-collapse">
          	<?php
          	$menuByUserType = array(
          		'manager' => array(
          			'/manager/orders/list' => __('Client Orders')
          		),
          		'admin'	=> array(
          			'/admin/orders/list' => __('Client Orders'),
          			'/admin/articles/list' => __('Writer Assignments'),
          			'/admin/users/list' => __('Users')
          		),
          		'user' => array(
          		),
          		'client' => array(
          		)
          	);
          	
          	$activeTopMenuItem = empty($activeTopMenuItem) ? false : $activeTopMenuItem;
          	
          	?>
          
            <ul class="nav">
              <?php if( !empty($user) ){ ?>
              	<li class="<?php echo $activeTopMenuItem ? '' : 'active' ?>"><?php echo $this->Html->link(__('Dashboard'), '/'.$user['User']['type'].'/dashboard') ?></li>
				<?php if(!empty($menuByUserType[$user['User']['type']])){
					foreach($menuByUserType[$user['User']['type']] as $link => $name){
						?><li class="<?php echo ( $activeTopMenuItem == $link ) ? 'active' : '' ?>"><?php echo $this->Html->link($name, $link) ?></li><?php
					}
				}              	
				?>
              	
              <?php } else { ?>
              	<li class="active"><?php echo $this->Html->link(__('Home'), '/') ?></li>
              <?php } ?>
              
            </ul>
            
            <ul class="nav pull-right">
              <?php if( !empty($user) ){ ?>
              		<li style="font-weight:bold"><?php echo $this->Html->link($user['User']['username'], '/users/profile') ?></li>
              		<li><?php echo $this->Html->link('Logout', '/users/logout'); ?></li> 
              <?php } else { ?>
              		<li><?php echo $this->Html->link('Login', '/users/login'); ?></li>
              <?php } ?>
			</ul>
            
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    

    <div class="container">
		<?php if( $flashMessage = $this->Session->flash() ){ ?>
			<div class="alert alert-success">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $flashMessage ?>
			</div>
		<?php } ?>

		<?php echo $this->fetch('content'); ?>
      <hr>

      <footer>
      	
        <p> <?php echo $this->Html->link(__('Privacy Policy'), '/pages/privacy_policy') ?> &copy; X 2012</p>
      </footer>

    </div> <!-- /container -->    
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>