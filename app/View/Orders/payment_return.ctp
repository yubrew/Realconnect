<div class="hero-unit">
	
	

	<?php
	// http://www.realconnect.mobi/orders/thank_you?tx=92C01753L9318762E&st=Completed&amt=36.00&cc=USD&cm=&item_number=
	
	
	$articlesCount = $order['Order']['articles_count'];
	
	
	?>

	
	<?php if($paymentResult == 'success') { ?>
		<h1 style="font-size:3em; color: green;">Payment was accepted successfully</h1>
		<br />
		<p>Order details were sent on your email.</p>
		<p>Thank you</p>
	<?php } else { ?>
		<h1 style="font-size:3em; color: red;">Payment was not successfull</h1>
		<br />
		<p>Please go <?php echo $this->Html->link('back', '/orders/pay/'.$order['Order']['id']) ?> and try once again. </p>
	<?php } ?>
	
	

</div>