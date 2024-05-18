<?php
session_start();
include '../../partials/dbConnect.php';

$product_id = $_GET['productid'];
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$special_instruction = isset($_GET['special_instruction']) ? $_GET['special_instruction'] : '';

$db = new Database();
$conn = $db->getConnection();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $user_id = $_SESSION['user_id'];

    // Prepare the merge statement for upserting the cart item
    $query = "
        MERGE INTO cart_product cp
        USING (SELECT :cart_id AS cart_id, :product_id AS product_id FROM dual) src
        ON (cp.cart_id = src.cart_id AND cp.product_id = src.product_id)
        WHEN MATCHED THEN 
            UPDATE SET cp.quantity = cp.quantity + :quantity, cp.special_instruction = :special_instruction
        WHEN NOT MATCHED THEN 
            INSERT (cp.cart_id, cp.product_id, cp.quantity, cp.special_instruction)
            VALUES (:cart_id, :product_id, :quantity, :special_instruction)
    ";

    // Get the user's cart ID
    $cart_id = $db->getCartIdUsingCustomerId($user_id);

    // Execute the query to add/update the cart item in the database
    $statement = oci_parse($conn, $query);
    oci_bind_by_name($statement, ':cart_id', $cart_id);
    oci_bind_by_name($statement, ':product_id', $product_id);
    oci_bind_by_name($statement, ':quantity', $quantity);
    oci_bind_by_name($statement, ':special_instruction', $special_instruction);

    if (oci_execute($statement)) {
        echo 'Item added to cart in database.';
    } else {
        echo 'Failed to add item to cart in database.';
    }

    // Merge cookies cart into the database if it exists
    if (isset($_COOKIE['cart'])) {
        $cartFromCookies = json_decode($_COOKIE['cart'], true);

        foreach ($cartFromCookies as $cookieProductId => $cookieItem) {
            $cookieQuantity = $cookieItem['quantity'];
            $cookieSpecialInstruction = isset($cookieItem['special_instruction']) ? $cookieItem['special_instruction'] : '';

            // Execute the query to add/update the cart item from cookies
            oci_bind_by_name($statement, ':product_id', $cookieProductId);
            oci_bind_by_name($statement, ':quantity', $cookieQuantity);
            oci_bind_by_name($statement, ':special_instruction', $cookieSpecialInstruction);

            if (oci_execute($statement)) {
                echo 'Item from cookie added to cart in database.';
            } else {
                echo 'Failed to add item from cookie to cart in database.';
            }
        }

        // Clear the cart cookie after updating the database
        setcookie('cart', '', time() - 3600, '/');
    }
} else {

    // Testing
    // To-be deleted
    var_dump($product_id);
    var_dump($quantity);
    var_dump($special_instruction);

    // If the user is not logged in, add the item to the cart in cookies
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
    } else {
        $cart = array();
    }

    if (isset($cart[$product_id])) {
        $cart[$product_id]['quantity'] += $quantity;
        $cart[$product_id]['special_instruction'] = $special_instruction;
    } else {
        $cart[$product_id] = array(
            'quantity' => $quantity,
            'special_instruction' => $special_instruction
        );
    }

    // Save the updated cart in the cookie
    setcookie('cart', json_encode($cart), time() + (86400 * 30), "/"); // 30 days expiration


    // To-be deleted
    if (isset($_COOKIE['cart'])) {
        var_dump($_COOKIE['cart']);
    } else {
        echo 'Cookie "cart" not set.';
    }

    echo 'Item added to cart in cookies.';
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
