<?php

include '../../partials/dbConnect.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = $_POST['customerId'];
    $productId = $_POST['productId'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    
    // Call addReview function
    $success = $db->addReview($customerId, $productId, $rating, $comments);
    
    if ($success) {
        http_response_code(200); // Success
    } else {
        http_response_code(500); // Server error
    }
} else {
    http_response_code(405); // Method not allowed
}
?>
