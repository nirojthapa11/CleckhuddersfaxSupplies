<?php
// updateQuantity.php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the necessary files and start the session
    require_once '../../partials/dbConnect.php';
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Get the product ID and new quantity from the POST data
    $productId = $_POST['productId'];
    $newQuantity = $_POST['newQuantity'];
    $cartId = $_POST['cartId'];

    // Echo the variables for debugging
    echo "Product ID: $productId, New Quantity: $newQuantity, Cart ID: $cartId";

    // Update the quantity in the database
    $db = new Database();
    $success = $db->updateQuantity($cartId, $productId, $newQuantity);

    // Return a JSON response indicating success or failure
    if ($success) {
        // Respond with a JSON object indicating success
        echo json_encode(['success' => true]);
    } else {
        // Respond with a JSON object indicating failure
        echo json_encode(['success' => false, 'message' => 'Failed to update quantity']);
    }
} else {
    // If the request method is not POST, return an error
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
}
?>
