
<?php
session_start(); 
require_once('../../partials/dbConnect.php'); 
$customerId = $_SESSION['user_id']; 
$db = new Database();
$updatedData = array();
        if (!empty($_POST['first-name'])) {
            $updatedData['FIRST_NAME'] = $_POST['first-name'];
        }
        if (!empty($_POST['last-name'])) {
            $updatedData['LAST_NAME'] = $_POST['last-name'];
        }
        if (!empty($_POST['username'])) {
            $updatedData['USERNAME'] = $_POST['username'];
        }
        if (!empty($_POST['email'])) {
            $updatedData['EMAIL'] = $_POST['email'];
        }
        if (!empty($_POST['address'])) {
            $updatedData['ADDRESS'] = $_POST['address'];
        }
        if (!empty($_POST['phone-number'])) {
            $updatedData['PHONE'] = $_POST['phone-number'];
        }
        if (!empty($_POST['age'])) {
            $updatedData['AGE'] = $_POST['age'];
        }
        if (!empty($_POST['gender'])) {
            $updatedData['GENDER'] = $_POST['gender'];
        }
        if (!empty($_POST['password'])) {
            $updatedData['PASSWORD'] = $_POST['password'];
        }

        if (!empty($updatedData)) {
            $result = $db->updateCustomerProfile($customerId, $updatedData);
            if ($result) {
                echo "Profile updated successfully.";
            } else {
                echo "Failed to update profile.";
            }
        }


$db->closeConnection();

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
