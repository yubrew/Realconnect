<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('cake.generic');
		
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('display');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('jquery-ui.min');
		echo $this->Html->script('bootstrap.min');
	?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

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
          <a class="brand" href="#">Syzygy</a>
          <div class="nav-collapse">
            <ul class="nav">
              <?php if( $user ){ ?>
              	<li class="active"><?php echo $this->Html->link('Dashboard', '/users/home') ?></li>
              <?php } else { ?>
              	<li class="active"><?php echo $this->Html->link('Home', '/') ?></li>
              <?php } ?>
              
            </ul>
            
            <ul class="nav pull-right">
              <?php if( $user ){ ?>
              		<li style="font-weight:bold"><?php echo $this->Html->link($user['User']['username'], '/users/home') ?></li>
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
