<?php $this->set( 'activeTopMenuItem','/admin/users/list'); ?>
<h1><?php echo __('Article Assignments') ?></h1>

<?php
	
	$pagesParams	=	$this->Paginator->params();
?>

<br />

<ul class="nav nav-pills">
	<li><?php echo $this->Html->link( __('Create a User' ), '/admin/users/add') ?></li>
</ul>

<?php if( $users ) { ?>

	<table cellpadding="0" cellspacing="0" style="width: 700px;" class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
		        <th><?php echo $this->Paginator->sort('User.id', 'ID'); ?></th>
		        <th><?php echo $this->Paginator->sort('User.username', __('Username')); ?></th>
		        <th><?php echo $this->Paginator->sort('User.email', __('Email')); ?></th>
		        <th><?php echo $this->Paginator->sort('User.type', __('Type')); ?></th>
		        <th><?php echo $this->Paginator->sort('User.status', __('Active?')); ?></th>
		        <th><?php echo __('Actions') ?></th>
		    </tr>
		</thead>
		<tbody>
			<?php 
			
			foreach ($users as $u){ 
				
			?>
		    <tr>
		        <td><?php echo h($u['User']['id']); ?> </td>
		        <td><?php echo h($u['User']['username']); ?> </td>
		        <td><?php echo h($u['User']['email']); ?> </td>
		        <td><?php echo h($u['User']['type']); ?> </td>
		        <td><?php echo h($u['User']['status']); ?> </td>		        		        		        		        
		        <td>
		        	<?php echo $this->Html->link(__('Edit'), '/admin/users/edit/'.$u['User']['id'], null); ?>
				</td>
		    </tr>
		    <?php } ?>
	    </tbody>
	</table>
	
	<?php if ((!empty($pagesParams['pageCount'])) && ($pagesParams['pageCount'] > 1)){ ?>
			
	<div class="pagination" style="margin: 0pt auto; width: 600px; margin-top: 10px; text-align: center;">
		<ul>
			<li <?php echo ($pagesParams['page'] == 1) ? ' class="disabled"' : ""; ?>>
				<?php echo $this->Paginator->prev(__('« Previous'), null, null, array('class' => 'disabled', "tag" => "a")) ?>
			</li>
			<?php echo $this->Paginator->numbers(array("tag" => "li", "before" => "", "after" => "", "separator" => "", "modulus" => 3)); ?>
			<li <?php echo ($pagesParams['pageCount'] == $pagesParams['page']) ? ' class="disabled"' : ""; ?>>
				<?php echo $this->Paginator->next(__('Next »'), null, null, array('class' => 'disabled', "tag" => "a")); ?>
			</li>
		</ul>
	</div>
	
	<?php } ?>

<?php } else { ?>
	<h3><?php echo __('There are no users yet') ?></h3>
<?php } ?>
