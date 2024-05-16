<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['FIRST_NAME']);
    $lastName = trim($_POST['LAST_NAME']);
    $age = intval($_POST['AGE']);
    $address = trim($_POST['ADDRESS']);
    $email = trim($_POST['EMAIL']);
    $phoneNumber = trim($_POST['PHONE']);
    $gender = $_POST['GENDER'];
    $username = trim($_POST['USERNAME']);
    $password = $_POST['PASSWORD'];
    $confirmPassword = $_POST['confirmPassword'];
    $registrationdate = $_POST['REGISTRATION_DATE'];

    // Password validation
    if ($password != $confirmPassword) {
        $error_message = 'Password and Confirm Password do not match!';
    } elseif (strlen($password) < 8 || strlen($password) > 32) {
        $error_message = "Password should be 8 to 32 characters long.";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', $password)) {
        $error_message = "Password should contain an uppercase letter, a number, and a special character.";
    } else {
        // Check for existing username, email, and contact
        $stmt = $connect->prepare("SELECT count(*) FROM TRADER WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $count = $stmt->fetchColumn();
        if ($count != 0) {
            $error_message = 'Username already exists!';
        } else {
            $stmt = $connect->prepare("SELECT count(*) FROM TRADER WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $count = $stmt->fetchColumn();
            if ($count != 0) {
                $error_message = 'Email already exists!';
            } else {
                $stmt = $connect->prepare("SELECT count(*) FROM TRADER WHERE phone = :phoneNumber");
                $stmt->execute([':phoneNumber' => $phoneNumber]);
                $count = $stmt->fetchColumn();
                if ($count != 0) {
                    $error_message = 'Contact number already exists!';
                } else {
                    // Hash the password before storing it
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    // Store user data in the session
                    $_SESSION['traderSignupData'] = [
                        'firstname' => $firstName,
                        'lastname' => $lastName,
                        'address' => $address,
                        'phone' => $phoneNumber,
                        'email' => $email,
                        'username' => $username,
                        'password' => $hashedPassword
                    ];
                    // Redirect to the next page
                    header("Location: ../shops/shopdetails.php");
                    exit;
                }
            }
        }
    }
    if (isset($error_message)) {
        echo "<script>alert('$error_message');</script>";
    }
}
?>
