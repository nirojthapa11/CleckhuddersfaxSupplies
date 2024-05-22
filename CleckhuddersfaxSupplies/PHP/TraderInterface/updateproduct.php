<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../Login_Signup/login.php");
    exit;
}
// Database Connection.
$conn = oci_connect('hembikram', 'Hem#123', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    $_SESSION['error'] = $m['message'];
    exit();
} else {
    $_SESSION['notification'] = "Connected to Oracle!";
}
// To show Trader Profile when Trader is logged in.
$query3 = "SELECT * FROM TRADER WHERE TRADER_ID = '$traderId'";
$statement_Trader = oci_parse($conn, $query3);
oci_execute($statement_Trader);
$fetchTrader = oci_fetch_assoc($statement_Trader);

if (isset($_POST['save'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    $query4 = "UPDATE TRADER SET FIRST_NAME = '$firstName', LAST_NAME = '$lastName', AGE = '$age', ADDRESS = '$address', EMAIL = '$email', PHONE = '$phone', GENDER = '$gender', USERNAME = '$username', PASSWORD = '$password', REGISTRATION_DATE = SYSDATE
    WHERE Trader_ID = '$traderId'";

    $statement_Trader = oci_parse($conn, $query4);
    $result1 = oci_execute($statement_Trader);

    if ($result1) {
        oci_commit($conn);
        header("Location: traderInterface.php");
        exit();
    } else {
        echo "Error updating profile!";
    }
    oci_close($conn);
};