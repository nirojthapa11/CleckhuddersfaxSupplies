<?php
session_start();
require_once '../partials/dbConnect.php';

$existingCart = []; // Initialize $existingCart as an empty array

if (isset($_COOKIE['cart'])) {
    $db = new Database();
    $conn = $db->getConnection();
    $cartItems = json_decode($_COOKIE['cart'], true);
    var_dump($cartItems); // Debugging line to check cart items

    try {
        // Prepare the SQL query to fetch cart items for the user
        $cartId = $db->getCartIdUsingCustomerId($_SESSION['user_id']); // Ensure this function is secure
        echo '<br>: cart id is' . $cartId . '<br>';
        $query = "SELECT product_id, quantity, special_instruction FROM cart_product WHERE cart_id = :cart_id";

        // Prepare the statement
        $statement = oci_parse($conn, $query);

        // Bind parameters
        oci_bind_by_name($statement, ":cart_id", $cartId);

        // Execute the statement
        oci_execute($statement);

        // Fetch rows one by one
        while ($row = oci_fetch_assoc($statement)) {


            // do delete
            echo '<br> var dumps: <br>';
            var_dump($row);
            echo '<br>';
            var_dump($row['PRODUCT_ID']);
            echo '<br>';
            var_dump($row['QUANTITY']);
            echo '<br>';
            var_dump($row['SPECIAL_INSTRUCTION']);
            echo '<br>';

            $existingCart[$row['PRODUCT_ID']] = array(
                'quantity' => $row['QUANTITY'],
                'special_instruction' => $row['SPECIAL_INSTRUCTION']
            );
        }

        echo '<br>existing from db ';
        var_dump($existingCart);
        echo '<br>';

        // Loop through items from the cookies and update or insert them into the database
        foreach ($cartItems as $product_id => $item) {
            $quantity = $item['quantity'];
            $special_instruction = isset($item['special_instruction']) ? $item['special_instruction'] : '';

            // Check if the product already exists in the cart
            if (isset($existingCart[$product_id])) {
                // Product exists, update its quantity and special instruction
                $existingCart[$product_id]['quantity'] += $quantity;
                $existingCart[$product_id]['special_instruction'] = $special_instruction;

                // Update the cart item in the database
                if ($db->updateCartItem($_SESSION['user_id'], $product_id, $existingCart[$product_id]['quantity'], $existingCart[$product_id]['special_instruction'])) {
                    echo 'Cart item updated in database.';
                } else {
                    echo 'Failed to update cart item in database.';
                }
            } else {
                // Product doesn't exist, insert it into the cart
                if ($db->insertCartItem($_SESSION['user_id'], $product_id, $quantity, $special_instruction)) {
                    echo 'New cart item inserted into database.';
                } else {
                    echo 'Failed to insert new cart item into database.';
                }
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

echo 'in cart utils';
header("Location: HomePage/homepage.php");
?>
