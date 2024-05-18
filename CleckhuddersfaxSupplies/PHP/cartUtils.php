<?php
require_once '../../partials/dbConnect.php';

function updateCartFromCookies($user_id) {
    if (isset($_COOKIE['cart'])) {
        $db = new Database();
        $conn = $db->getConnection();
        $cartItems = json_decode($_COOKIE['cart'], true);

        try {
            foreach ($cartItems as $product_id => $item) {
                $quantity = $item['quantity'];
                $special_instruction = isset($item['special_instruction']) ? $item['special_instruction'] : '';

                // Get cart ID for the user
                $cart_id = $db->getCartIdUsingCustomerId($user_id);

                // Use a MERGE statement for the upsert operation
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

                $statement = oci_parse($conn, $query);

                // Bind parameters
                oci_bind_by_name($statement, ":cart_id", $cart_id);
                oci_bind_by_name($statement, ":product_id", $product_id);
                oci_bind_by_name($statement, ":quantity", $quantity);
                oci_bind_by_name($statement, ":special_instruction", $special_instruction);

                if (!oci_execute($statement)) {
                    $m = oci_error($statement);
                    throw new Exception("Error executing query: " . $m['message']);
                }

                oci_free_statement($statement);
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
