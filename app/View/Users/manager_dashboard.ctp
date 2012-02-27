<h1><?php echo __('Dashboard') ?></h1>

<?php
	$this->Paginator->options(array('url' => array('controller' => 'manager', 'action' => 'dashboard') ));
	$pagesParams	=	$this->Paginator->params();
?>

<br />

<?php if( $assignments ) { ?>

	<table cellpadding="0" cellspacing="0" style="width: 700px;" class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
		        <th><?php echo $this->Paginator->sort('WriterAssignment.id', 'ID'); ?></th>
		        <th><?php echo $this->Paginator->sort('WriterAssignment.create_date', __('Date')); ?></th>
		        <th><?php echo $this->Paginator->sort('WriterAssignment.status', __('Status')); ?></th>
		        <th><?php echo $this->Paginator->sort('Writer.username', __('Writer')); ?></th>
		        <th><?php echo __('Keywords') ?></th>
		        <th><?php echo __('Hours left') ?></th>
		        <th><?php echo __('Actions') ?></th>
		    </tr>
		</thead>
		<tbody>
			<?php 
			
			$now = time();
			
			foreach ($assignments as $a){ 
			
			$assignmentStartTimestamp = strtotime($a['WriterAssignment']['create_date']);
			$secondsFromStart = $now - $assignmentStartTimestamp;
			$orderDeliverySeconds = $a['WriterOrder']['Order']['OrderDeliveryOption']['delivery_hours'] * 3600 ;// seconds
			
			$secondsLeft = $orderDeliverySeconds - $secondsFromStart;
				
			?>
		    <tr>
		        <td><?php echo h($a['WriterAssignment']['id']); ?> </td>
		        <td><?php echo date( 'm/d/y', $assignmentStartTimestamp); ?> </td>
		        <td><?php echo h($a['WriterAssignment']['status']); ?></td>
		        <td><?php echo h($a['Writer']['username']); ?></td>
		        <td><?php $keywords = Set::extract( '/WriterOrder/Keyword/keyword', $a ); echo join(', ',$keywords); ?></td>
		        <td><span class="<?php echo $secondsLeft > 0 ? 'deadline-not-passed' : 'deadline-passed' ?>"><?php echo  round($secondsLeft/3600) ?>h</span></td>
		        <td>
		        	<?php echo $this->Html->link(__('Review'), '/manager/articles/review/'.$a['WriterAssignment']['id'], null); ?> | 
		        	<?php echo $this->Html->link(__('Export'), '/manager/articles/export/'.$a['WriterAssignment']['id'], null); ?>
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
	<h3><?php echo __('There are no articles yet') ?></h3>
<?php } ?>
