<?php
session_start();
include '../../partials/dbConnect.php';

$product_id = $_GET['productid'];
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$special_instruction = isset($_GET['special_instruction']) ? $_GET['special_instruction'] : '';

$db = new Database();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $user_id = $_SESSION['user_id'];

    if ($db->addCartItem($user_id, $product_id, $quantity, $special_instruction)) {
        echo 'Item added to cart in database.';
    } else {
        echo 'Failed to add item to cart in database.';
    }
} else {
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
    } else {
        $cart = array();
    }

    if (isset($cart[$product_id])) {
        $cart[$product_id] += $quantity;
    } else {
        $cart[$product_id] = $quantity;
    }

    // Save the updated cart in the cookie
    setcookie('cart', json_encode($cart), time() + (86400 * 30), "/"); // 30 days expiration
    echo 'Item added to cart in cookies.';
}

// Redirect to the previous page or cart page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
