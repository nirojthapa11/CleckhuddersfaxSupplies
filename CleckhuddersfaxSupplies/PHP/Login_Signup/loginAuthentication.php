<?php
session_start();
$conn = oci_connect('hembikram', 'Hem#123', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}

if (isset($_POST['login'])) {
    $email_username = $_POST['userName'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role == 'Customer') {
        $query = "SELECT * FROM CUSTOMER WHERE Email = :email OR USERNAME = :username";
    } elseif ($role == 'Trader') {
        $query = "SELECT * FROM TRADER WHERE Email = :email OR USERNAME = :username";
    } elseif ($role == 'Admin') {
        $query = "SELECT * FROM ADMIN WHERE USERNAME = :username";
    } else {
        echo '<script>alert("Invalid role selected.");</script>';
        exit();
    }

    $statement = oci_parse($conn, $query);
    if (!$statement) {
        $e = oci_error($conn);
        echo "<script>alert('SQL Parsing Error: " . $e['message'] . "');</script>";
        exit();
    }

    // Bind parameters
    oci_bind_by_name($statement, ":email", $email_username);
    oci_bind_by_name($statement, ":username", $email_username);

    if (!oci_execute($statement)) {
        $e = oci_error($statement);
        echo "<script>alert('SQL Execution Error: " . $e['message'] . "');</script>";
        exit();
    }

    // Fetch the user record
    $user = oci_fetch_assoc($statement);

    if ($user) {
        // Verify password
        if ($user['PASSWORD'] === $password) {
            // if Authentication successful
            $_SESSION['user'] = $user;
            // Redirect users to role based pages
            if ($role == 'Customer') {
                header("Location: ../HomePage/homepage.php");
            } elseif ($role == 'Trader') {
                header("Location: ../TraderInterface/traderInterface.php");
            } elseif ($role == 'Admin') {
                header("Location: ../AdminInterface/adminInterface.php");
            }
            exit(); // Make sure to exit after redirection
        } else {
            // Password doesn't match
            echo '<script>alert("Incorrect password. Please try again.");</script>';
        }
    } else {
        // User not found
        echo '<script>alert("User not found. Please register or check your email.");</script>';
    }

    oci_close($conn);
}
?>

