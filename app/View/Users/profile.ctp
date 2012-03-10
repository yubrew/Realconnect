<?php $this->set( 'activeTopMenuItem','/users/profile'); ?>
<h1>Profile</h1>
<h2 style="font-style:italic"><?php echo $userData['User']['username'] ?></h2>
<h3>Registered : <?php echo date('m/d/Y', strtotime( $userData['User']['registered_date']) ) ?> </h3>