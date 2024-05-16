<?php
require_once '../../partials/dbConnect.php';




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
                        <label for="userName"></label><input type="text" id="userName" name="userName" required
                                                             placeholder="Username or Email">
                        <label for="password"></label><input type="password" id="password" name="password" required
                                                             placeholder="Password">
                        <div class="input_group">
                            <label for="usertype">Login As:</label>
                            <select name="usertype" id="usertype">
                                <option value="customer" selected>Customer</option>
                                <option value="admin">Admin</option>
                                <option value="trader">Trader</option>
                            </select>
                        </div>
                        <input type="submit" name="login" value="Login" class="form_btn">
                        <a href="../VerificationPage/emailVerification.php">Forgot Password?</a>
                        <p>Don't have an account? <a href="customerSignup.php">SignUp now</a></p>
                    </header>
                </div>
            </div>
        </form>
    </div>
    </body>
    </html>
<?php