<?php
$conn = oci_connect('hembikram', 'Hem#123', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
} else {
    print "Connected to Oracle!";
}

if(isset($_POST['submit']))
{
    // Retrieve form data 
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $fname = $_POST['firstName'];
    $lname = $_POST['firstName'];
    $number = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST["gender"];
    $Uname = $_POST['userName'];
    $cpassword = $_POST['confirmPassword'];

    // Check if email, username, or contact number already exists
    $query_check = "SELECT Email, Username, Phone FROM Customer WHERE Email = '$email' OR Username = '$Uname' OR Phone = '$number'";
    $statement_check = oci_parse($conn, $query_check);
    oci_execute($statement_check);
    $row = oci_fetch_assoc($statement_check);

    if ($row !== false) {
        $message = "Email, username, or phone number already exists. Please use different ones.";
        if ($email === $row['Email']) {
            $message = "Email already exists. Please use a different email.";
        } elseif ($Uname === $row['Username']) {
            $message = "Username already exists. Please use a different username.";
        } elseif ($number === $row['Phone']) {
            $message = "Phone number already exists. Please use a different one.";
        }
        echo '<script>alert("' . $message . '")</script>';
        exit();
    }

    // password validation
    if ($password !== $cpassword) {
        echo '<script>alert("Password and Confirm Password do not match. Please try again.")</script>';
        exit();  
    }
    
    if (strlen($password) < 8 || strlen($password) > 32 ) {
        echo '<script>alert("Password must be at least 8 or less than 32 characters long.")</script>';
        exit();
    }

    if (!preg_match('/[!@#$%^&*()\-_=+]/', $password)) {
        echo '<script>alert("Password must contain at least one special charcater.")</script>';
        exit();
    }
    
    // SQL query
    $query = "INSERT INTO Customer (Cust_image, First_Name, Last_Name, Address, Age, Email, Phone, Gender, Username, Password, Registration_Date) 
    VALUES (null, '$fname', '$lname', '$address', '$age', '$email', '$number', '$gender', '$Uname', '$password', SYSDATE)";

    $statement = oci_parse($conn, $query);
    $result = oci_execute($statement);

    if($result) {
        oci_commit($conn);
        header("Location: ../Login_Signup/login.php");
        exit(); 
    }
    else {
        $error = oci_error($statement);
        echo "Error: " . $error['message']; // Display Oracle error message
    }

    oci_close($conn);
}
?>
