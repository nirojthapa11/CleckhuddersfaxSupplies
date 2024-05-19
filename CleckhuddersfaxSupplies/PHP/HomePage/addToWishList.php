<?php
session_start(); // Start the session to access session variables

include '../../partials/dbConnect.php';
$db = new Database();
$productId = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

if ($productId === 0) {
    echo "Error: Product ID is missing or invalid.";
    exit;
}

// Check if customer ID exists in session
if (!isset($_SESSION['user_id'])) {
    echo "Error: Customer ID not found in session.";
    exit;
}

$customerId = $_SESSION['user_id']; // Get customer ID from session

$result = $db->addToWishlist($productId, $customerId); // Call addToWishlist method with product ID and customer ID
header("Location: " . $_SERVER['HTTP_REFERER']);

?>
