
<?php
session_start();
require_once '../../partials/dbConnect.php';

function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($_POST['userName']);
    $password = sanitizeInput($_POST['password']);
    $usertype = $_POST['usertype'];
    $query = '';

    echo $username . $password . $usertype;

    if ($usertype == 'customer') {
        $query = "SELECT username, password FROM Customer WHERE username = '$username' AND password = '$password'";
    }
    elseif ($usertype == 'trader') {
        $query = "SELECT username, password FROM Trader WHERE username = '$username' AND password = '$password'";
    }
    elseif ($usertype == 'admin') {
        $query = "SELECT username, password FROM Customer WHERE username = '$username' AND password = '$password'";
    }

    try {
        $db = new Database();

        $statement = $db->executeQuery($query, ['username' => $username, 'password' => $password]);

        if ($row = $db->fetchRow($statement)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];

            header("Location: ../HomePage/homepage.php");
            exit;
        } else {
            echo "Invalid username or password. Please try again.";
        }

        $db->closeConnection();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="form_container">
    <form action="" method="POST">
        <div class="login">
            <div class="image_container">
                <img src="image.jpg" alt="Company Image" class="company_image">
            </div>
            <div class="form_content">
                <header>
                    <img src="Website Logo.png" alt="" class="logo">
                    <h1>Login</h1>
                    <!-- Username or Email -->
                    <label for="userName">Username or Email:</label>
                    <input type="text" id="userName" name="userName" required placeholder="Enter your username or email">

                    <!-- Password -->
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">

                    <!-- Login As -->
                    <div class="input_group">
                        <label for="usertype">Login As:</label>
                        <select name="usertype" id="usertype">
                            <option value="customer" selected>Customer</option>
                            <option value="admin">Admin</option>
                            <option value="trader">Trader</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <input type="submit" name="login" value="Login" class="form_btn">

                    <!-- Forgot Password Link -->
                    <a href="../VerificationPage/emailVerification.php">Forgot Password?</a>

                    <!-- Sign Up Link -->
                    <p>Don't have an account? <a href="customerSignup.php">Sign Up now</a></p>
                </header>
            </div>
        </div>
    </form>
</div>
</body>
</html>
