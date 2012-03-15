<?php $this->set( 'activeTopMenuItem','/manager/orders/list'); ?>
<h1><?php echo __('Client Orders') ?></h1>

<?php
	
	$pagesParams	=	$this->Paginator->params();
?>
<script type="text/javascript">
$(function(){
	
	$("textarea").autoResize({ extraSpace: 40 });
	
	// AtD.rpc_css = 'http://www.polishmywriting.com/atd-jquery/server/proxycss.php?data=';
	// AtD.rpc_css = "<?php echo $this->Html->url('/proxycss.php', true); ?>?data=";
	// $("#WriterOrderKeywords").addProofreader();
});		

</script>
<br />

<div class="btn-group" style="margin-bottom: 1em">
  <?php 
  $statuses = array( 'pending' => __('Pending'), 'in_progress' => __('In progress'), 'completed' => __('Completed'));
  foreach($statuses as $k => $statusName )
  {
		echo $this->Html->link( $statusName, '/manager/orders/list/'. $k , array('class' => 'btn' , 'disabled' => ( ( $status == $k ) ? 'disabled' : false ) ) );
  }
  ?>
</div>


<?php if( $orders ) { ?>

	<table cellpadding="0" cellspacing="0"  class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
		        <th><?php echo $this->Paginator->sort('Order.id', __('order id')); ?></th>
		        <th><?php echo $this->Paginator->sort('Order.create_date', __('order date')); ?></th>
		        <th><?php echo  __('status'); ?></th>
		        <th><?php echo $this->Paginator->sort('ArticleTemplate.name', __('article template')); ?></th>
		        <th><?php echo $this->Paginator->sort('Client.username', __('client')); ?></th>
		        <th><?php echo __('hours left') ?></th>
		        <th><?php echo __('actions') ?></th>			
			

		    </tr>
		</thead>
		<tbody>
			<?php 
			
			$now = time();
			
			foreach ($orders as $order){ 
				
			$assignmentStartTimestamp = strtotime($order['Order']['create_date']);
			$secondsFromStart = $now - $assignmentStartTimestamp;
			$orderDeliverySeconds = $order['OrderDeliveryOption']['delivery_hours'] * 3600 ;// seconds
			
			$secondsLeft = $orderDeliverySeconds - $secondsFromStart;				
				
			?>
		    <tr>
		        <td><?php echo h($order['Order']['id']); ?> </td>
		        <td><?php echo date( 'm/d/y H:i:s', strtotime( $order['Order']['create_date'])); ?></td>
		        <td><?php echo $order['Order']['completed_articles_count'].'/'.$order['Order']['articles_count']. __(' completed') ?></td>
		        <td><?php echo h( $order['ArticleTemplate']['name']); ?></td>
		        
		        <td><?php echo h($order['Client']['username']); ?></td>
		        
		        <td><span class="<?php echo $secondsLeft > 0 ? 'deadline-not-passed' : 'deadline-passed' ?>"><?php echo  round($secondsLeft/3600) ?>h</span></td>
		        <td>
		        	<?php echo $this->Html->link(__('View & Assign'), '/manager/orders/view/'.$order['Order']['id']); ?> 
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
