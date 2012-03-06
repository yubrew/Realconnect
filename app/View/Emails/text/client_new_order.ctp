Your order was submitted successfully !

Article will be sent on this email.

Order #<?php echo $order['Order']['id']?>
<?php

$articlesCount = $order['Order']['articles_count'];
$amount = round( $articlesCount * (float)$order['OrderDeliveryOption']['price_per_article'], 2);

?>

<?php echo $articlesCount ?> articles

<?php echo $order['OrderDeliveryOption']['description'] ?>

Total amount : $<?php echo $amount ?>

Details:

<?php echo $order['Order']['details'] ?>

 
