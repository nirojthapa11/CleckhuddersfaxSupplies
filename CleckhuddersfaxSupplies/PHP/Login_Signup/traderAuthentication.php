<?php
session_start();
$conn = oci_connect('hembikram', 'Hem#123', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Password validation
    if ($password != $cpassword) {
        $error_message = 'Password and Confirm Password do not match!';
    } elseif (strlen($password) < 8 || strlen($password) > 32) {
        $error_message = "Password should be 8 to 32 characters long.";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', $password)) {
        $error_message = "Password should contain an uppercase letter, a number, and a special character.";
    } else {
        // Check for existing username, email, and contact
        $stmt = oci_parse($conn, "SELECT count(*) AS COUNT FROM TRADER WHERE Username = :username");
        oci_bind_by_name($stmt, ':username', $username);
        oci_execute($stmt);
        $row = oci_fetch_array($stmt, OCI_ASSOC);
        if ($row['COUNT'] != 0) {
            $error_message = 'Username already exists!';
        } else {
            $stmt = oci_parse($conn, "SELECT count(*) AS COUNT FROM TRADER WHERE Email = :email");
            oci_bind_by_name($stmt, ':email', $email);
            oci_execute($stmt);
            $row = oci_fetch_array($stmt, OCI_ASSOC);
            if ($row['COUNT'] != 0) {
                $error_message = 'Email already exists!';
            } else {
                $stmt = oci_parse($conn, "SELECT count(*) AS COUNT FROM TRADER WHERE Phone = :number");
                oci_bind_by_name($stmt, ':number', $number);
                oci_execute($stmt);
                $row = oci_fetch_array($stmt, OCI_ASSOC);
                if ($row['COUNT'] != 0) {
                    $error_message = 'Contact number already exists!';
                } else {
                    // Hash the password before storing it
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    // Store user data in the session
                    $_SESSION['traderSignupData'] = [
                        'First_Name' => $fname,
                        'Last_Name' => $lname,
                        'Address' => $address,
                        'Phone' => $number,
                        'Email' => $email,
                        'Username' => $username,
                        'Password' => $hashedPassword
                    ];
                    // Redirect to the next page
                    header("Location: Shop.php");
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