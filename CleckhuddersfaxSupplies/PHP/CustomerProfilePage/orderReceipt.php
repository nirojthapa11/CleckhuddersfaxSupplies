<?php
require_once '../MailerService.php';

$cart_products = isset($_GET['cart_products']) ? json_decode(urldecode($_GET['cart_products']), true) : [];
// var_dump($cart_products);
$total = 0;
foreach ($cart_products as $product) {
    $total += $product['PRICE'] * $product['QUANTITY'];
}

// Include total in the order details array
$orderDetails = $cart_products;
$orderDetails['total'] = $total;

// Call the sendOrderReceipt function
var_dump($orderDetails);
$mailerService = new MailerService();
$mailSent = $mailerService->sendOrderReceipt('tgovind22@tbc.edu.np', $orderDetails);


?>
