<?php
session_start();
include '../../partials/dbConnect.php';

$product_id = $_GET['productid'];
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$special_instruction = isset($_GET['special_instruction']) ? $_GET['special_instruction'] : '';

$db = new Database();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $user_id = $_SESSION['user_id'];

    // Retrieve cart data from the database
    $cartFromDatabase = $db->getCartItems($user_id);

    if (isset($_COOKIE['cart'])) {
        $cartFromCookies = json_decode($_COOKIE['cart'], true);
    } else {
        $cartFromCookies = array();
    }

    // Merge cart data
    $mergedCart = array_merge($cartFromDatabase, $cartFromCookies);
    var_dump($mergedCart);

    // Update the database with the merged cart data
    foreach ($mergedCart as $product_id => $cartItem) {
        $quantity = $cartItem['quantity'];
        $special_instruction = $cartItem['special_instruction'];

        if ($db->updateCartItem($user_id, $product_id, $quantity, $special_instruction)) {
            echo 'Cart items updated in database.';
        } else {
            echo 'Failed to update cart items in database.';
        }
    }

    // Clear the cart cookie after updating the database
    setcookie('cart', '', time() - 3600, '/');

    // Add the new item to the database
    if ($db->addCartItem($user_id, $product_id, $quantity, $special_instruction)) {
        echo 'Item added to cart in database.';
    } else {
        echo 'Failed to add item to cart in database.';
    }
} else {
    // If the user is not logged in, add the item to the cart in cookies
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

if($_SERVER['HTTP_REFERER'] == "login.php") {
    header("Location: homepage.php");
}
else{
    header("Location: " . $_SERVER['HTTP_REFERER']);

}

exit;
?>
