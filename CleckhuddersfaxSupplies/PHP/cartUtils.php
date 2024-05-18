<?php
session_start();
require_once '../partials/dbConnect.php';
$user_id = $_SESSION['user_id'];
updateCartFromCookies($user_id);

// Correctly access user_id from the session
function updateCartFromCookies($user_id) {
    if (isset($_COOKIE['cart'])) {
        $db = new Database();
        $conn = $db->getConnection();
        $cartItems = json_decode($_COOKIE['cart'], true);
        var_dump($cartItems); // Debugging line to check cart items

        try {
            // Fetch existing cart data from the database
            $existingCart = $db->getCartItems($user_id);
            var_dump($existingCart); // Debugging line to check existing cart data

            // Merge cart data from cookies with existing cart data
            foreach ($cartItems as $product_id => $item) {
                $quantity = $item['quantity'];
                $special_instruction = isset($item['special_instruction']) ? $item['special_instruction'] : '';

                // Update existing cart data with data from cookies
                if (isset($existingCart[$product_id])) {
                    $existingCart[$product_id]['quantity'] += $quantity;
                    $existingCart[$product_id]['special_instruction'] = $special_instruction;
                } else {
                    $existingCart[$product_id] = array(
                        'quantity' => $quantity,
                        'special_instruction' => $special_instruction
                    );
                }
            }

            // Update the database with the merged cart data
            foreach ($existingCart as $product_id => $cartItem) {
                $quantity = $cartItem['quantity'];
                $special_instruction = $cartItem['special_instruction'];

                // Update or insert the cart item into the database
                if ($db->updateCartItem($user_id, $product_id, $quantity, $special_instruction)) {
                    echo 'Cart item updated in database.';
                } else {
                    echo 'Failed to update cart item in database.';
                }
            }

            // Commit the transaction
            oci_commit($conn);

            // Clear the cookie after updating the database
            setcookie('cart', '', time() - 3600, "/");

        } catch (Exception $e) {
            oci_rollback($conn); // Rollback in case of an error
            echo "Error: " . $e->getMessage();
        } finally {
            $db->closeConnection();
        }
    }
}
?>
