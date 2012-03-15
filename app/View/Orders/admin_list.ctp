<?php $this->set( 'activeTopMenuItem','/admin/orders/list'); ?>
<h1><?php echo __('Client Orders') ?></h1>

<?php
	
	$pagesParams	=	$this->Paginator->params();
?>

<br />
<ul class="nav nav-pills">
	<li><?php echo $this->Html->link( __('Create an Order' ), '/admin/orders/add') ?></li>
</ul>
<br />

<div class="btn-group" style="margin-bottom: 1em">
  <?php 
  $statuses = array( 'all' => __('All'), 'pending' => __('Pending'), 'in_progress' => __('In progress'), 'completed' => __('Completed'));
  foreach($statuses as $k => $statusName )
  {
		echo $this->Html->link( $statusName, '/admin/orders/list/'. $k , array('class' => 'btn' , 'disabled' => ( ( $status == $k ) ? 'disabled' : false ) ) );
  }
  ?>
</div>

<?php if( $orders ) { ?>

	<table cellpadding="0" cellspacing="0"  class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
		        <th><?php echo $this->Paginator->sort('Order.id', 'ID'); ?></th>
		        <th><?php echo $this->Paginator->sort('Order.create_date', __('Date')); ?></th>
		        <th><?php echo $this->Paginator->sort('Order.status', __('Status')); ?></th>
		        <th><?php echo $this->Paginator->sort('OrderDeliveryOption.description', __('Delivery')); ?></th>
		        <th><?php echo $this->Paginator->sort('Client.username', __('Client')); ?></th>
		        
		        <th><?php echo __('Actions') ?></th>
		    </tr>
		</thead>
		<tbody>
			<?php 
			
			$now = time();
			
			foreach ($orders as $order){ 
				
			?>
		    <tr>
		        <td><?php echo h($order['Order']['id']); ?> </td>
		        <td><?php echo date( 'm/d/y H:i:s', strtotime( $order['Order']['create_date'])); ?></td>
		        <td><?php echo h($order['Order']['status']); ?></td>
		        <td><?php echo h( $order['OrderDeliveryOption']['description']); ?></td>
		        <td><?php echo $this->Html->link($order['Client']['username'], '/admin/users/edit/'.$order['Client']['id']); ?></td>
		        <td>
		        	<?php echo $this->Html->link(__('Edit'), '/admin/orders/edit/'.$order['Order']['id']); ?> | 
		        	<?php echo $this->Html->link(__('View Assignments'), '/admin/articles/list_by_order/'.$order['Order']['id']); ?> |
		        	<?php echo $this->Html->link(__('Assign to writer'), '/admin/orders/assign/'.$order['Order']['id'] ); ?>
				</td>
		    </tr>
		    <?php } ?>
	    </tbody>
	</table>
	
	<?php if ((!empty($pagesParams['pageCount'])) && ($pagesParams['pageCount'] > 1)){ ?>
			
	<div class="pagination" style="margin: 0pt auto; margin-top: 10px; text-align: center;">
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
	<h3><?php echo __('There are no orders yet') ?></h3>
<?php } ?>
