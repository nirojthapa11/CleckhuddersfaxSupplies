<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../../partials/dbConnect.php';
    require_once '../alertService.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $db = new Database();

    $productId = $_POST['productId'];
    $newQuantity = $_POST['newQuantity'];
    $cartId = $_POST['cartId'];

    $productStock = $db->getProductStock($productId);

    if ($newQuantity > $productStock) {
        AlertService::setError('Quantity exceeds available stock');
        echo json_encode(['success' => false, 'message' => 'Quantity exceeds available stock']);
        exit(); 
    }

    $success = $db->updateQuantity($cartId, $productId, $newQuantity);

    if ($success) {
        AlertService::setSuccess('Quantity updated successfully');
        echo json_encode(['success' => true]);
    } else {
        AlertService::setError('Failed to update quantity');
        echo json_encode(['success' => false, 'message' => 'Failed to update quantity']);
    }
} else {
    http_response_code(405);
    AlertService::setError('Method not allowed');
    echo json_encode(['error' => 'Method not allowed']);
}
?>
