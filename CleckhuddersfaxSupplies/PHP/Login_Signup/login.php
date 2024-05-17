<?php
session_start();
require_once '../../partials/dbConnect.php';

function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

$showError = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['userName']) || empty($_POST['password'])) {
        $showError = "Username/email or password is missing.";
    } else {
        $username = sanitizeInput($_POST['userName']);
        $password = sanitizeInput($_POST['password']);
        $usertype = $_POST['usertype'];
        $query = '';

        
        if ($usertype == 'customer') {
            $query = "SELECT customer_id as user_id, username, password FROM Customer WHERE username = '$username' AND password = '$password'";
        } elseif ($usertype == 'trader') {
            $query = "SELECT trader_id as user_id, username, password FROM Trader WHERE username = '$username' AND password = '$password'";
        } elseif ($usertype == 'admin') {
            $query = "SELECT admin_id as user_id, username, password FROM Admin WHERE username = '$username' AND password = '$password'";
        }

        try {
            $db = new Database();

            $statement = $db->executeQuery($query);

            if ($row = $db->fetchRow($statement)) {
                var_dump($row);
                $_SESSION['isAuthenticated'] = true;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['user_id'];

                header("Location: ../HomePage/homepage.php");
                exit;
            } else {
                $showError = "Invalid username or password. Please try again.";
            }

            $db->closeConnection();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>


<?php if ($showError) { ?>
    <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 15px;">
        <strong>Error!</strong> <?php echo $showError; ?>
        <button type="button" style="background: none; border: none; color: #721c24; cursor: pointer; float: right;"
                onclick="this.parentNode.style.display = 'none';" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>


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
                    <input type="text" id="userName" name="userName" required
                           placeholder="Enter your username or email">

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
