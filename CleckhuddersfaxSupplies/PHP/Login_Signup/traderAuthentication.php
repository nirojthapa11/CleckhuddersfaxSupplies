<?php
include '../../partials/dbConnect.php';
require_once '../MailerService.php';

$db = new Database();
$conn = $db->getConnection();

session_start();

if (isset($_POST['submit'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $number = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['userName'] = $_POST['userName'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirmPassword'] = $_POST['confirmPassword'];

    // Password validation
    if (strlen($password) < 8 || strlen($password) > 32) {
        $_SESSION['error'] = "Password must be at least 8 or less than 32 characters long.";
        $_SESSION['form_data'] = $_POST;
        header("Location: customerSignup.php");
        exit();
    }
    if ($password !== $cpassword) {
        $_SESSION['error'] = "Password and Confirm Password do not match. Please try again.";
        $_SESSION['form_data'] = $_POST;
        header("Location: customerSignup.php");
        exit();
    }
    if (!preg_match('/[!@#$%^&*()\-_=+]/', $password)) {
        $_SESSION['error'] = "Password must contain at least one special character.";
        $_SESSION['form_data'] = $_POST;
        header("Location: customerSignup.php");
        exit();
    }

    
    // Check if email, username, or contact number already exists
    $query_check = "SELECT Email, Username, Phone FROM Trader WHERE Email = '$email' OR Username = '$Uname' OR Phone = '$number'";
    $statement_check = oci_parse($conn, $query_check);
    oci_execute($statement_check);
    $row = oci_fetch_assoc($statement_check);

    if ($row !== false) {
        $message = "Email, username, or phone number already exists. Please use different ones.";
        if ($email === $row['EMAIL']) {
            $message = "Email already exists. Please use a different email.";
        } elseif ($Uname === $row['USERNAME']) {
            $message = "Username already exists. Please use a different username.";
        } elseif ($number === $row['PHONE']) {
            $message = "Phone number already exists. Please use a different one.";
        }
        $_SESSION['error'] = $message;
        $_SESSION['form_data'] = $_POST; 
        header("Location: customerSignup.php");
        exit();
    }














}
?>