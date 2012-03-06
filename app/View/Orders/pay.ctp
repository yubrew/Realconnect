<div class="hero-unit">
	<h1 style="font-size:3em">Order Details</h1>
	<div class="order-payment">
	
	
	
	<?php
	
	// http://www.realconnect.mobi/orders/thank_you?tx=92C01753L9318762E&st=Completed&amt=36.00&cc=USD&cm=&item_number=
	
	
	$articlesCount = $order['Order']['articles_count'];
	$amount = round( $articlesCount * (float)$order['OrderDeliveryOption']['price_per_article'], 2);
	
	
	?>
	
	<p><br /><?php echo $articlesCount ?> articles</p>
	
	<p><?php echo $order['OrderDeliveryOption']['description'] ?></p>
	
	<p>Total amount : <b style="font-weight:bold;">$<?php echo $amount ?></b></p>
	<p><?php echo nl2br( h( $order['Order']['details'] ) ) ?>
		
	</p> 
	
	
	<?php
	$paymentOptions = array(
		'test' 				=> true,
		'item_name'			=> 'Order #'.$order['Order']['id'].' : ' . $articlesCount .' Articles',
		'amount'			=> $amount,
		'notify_url' 		=> $this->Html->url(array('plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'process'), true),
		'return'			=> $this->Html->url('/orders/payment_return/'.$order['Order']['id'], true),
		'cancel_return'		=> $this->Html->url('/orders/payment_return/'.$order['Order']['id'].'/cancel', true),
		'no_shipping'		=> 1, // address is no required
	    'currency_code' 	=> 'USD', //Currency
	    'lc' 				=> 'US', //Locality	
	    'item_number'		=> 'Order-'.$order['Order']['id'],
	    'address_ override'	=> 1
	);
	
	echo $this->Paypal->button(' Pay ', $paymentOptions );
	
	?>
	</div>
</div>