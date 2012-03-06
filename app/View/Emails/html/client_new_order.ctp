<h3>Your order was submitted successfully</h3>
<p>Article will be sent on this email</p> 
<p>Order #<?php echo $order['Order']['id']?></p>
<?php

$articlesCount = $order['Order']['articles_count'];
$amount = round( $articlesCount * (float)$order['OrderDeliveryOption']['price_per_article'], 2);


?>

<p><?php echo $articlesCount ?> articles</p>

<p><?php echo $order['OrderDeliveryOption']['description'] ?></p>

<p>Total amount : <b style="font-weight:bold;">$<?php echo $amount ?></b></p>

<p>Details: <br /><?php echo nl2br( h( $order['Order']['details'] ) ) ?></p>


