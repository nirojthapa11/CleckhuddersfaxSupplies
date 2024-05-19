<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Sign Up</title>
    <link rel="stylesheet" href="traderSignup.css">
</head>
<body>

<div class="form_container">
    <form action="traderAuthentication.php" method="POST">
        <div class="signup">
            <div class="image_container">
                <img src="image.jpg" alt="Company Image" class="company_image">
            </div>
            <div class="form_content">
                <header>
                    <h1>Trader Sign Up</h1>
                </header>
                <div class="input-group">
                    <input type="text" id="firstName" name="firstName" required placeholder="First Name">
                    <input type="text" id="lastName" name="lastName" required placeholder="Last Name">
                </div>
                <input type="text" id="userName" name="userName" required placeholder="Username">
                <input type="email" id="email" name="email" required placeholder="Email">
                <input type="tel" id="phoneNumber" name="phoneNumber" required placeholder="Phone Number">
                <input type="text" id="address" name="address" required placeholder="Address">
                <div class="input-group">
                    <input type="number" id="age" name="age" required placeholder="Age">
                    <select name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <input type="password" id="password" name="password" required placeholder="Password">
                <input type="password" id="confirmPassword" name="confirmPassword" required
                       placeholder="Confirm Password">
                <div class="checkbox-container">
                    <input type="checkbox" id="terms" name="terms" value="Bike">
                    <label for="terms">I Accept the <a href="#">terms and conditions.</a></label>
                </div>
                <input type="submit" name="next" value="Next" class="form_btn">
                <p>Already have an account? <a href="login.php">Login now</a></p>
                <p>Become a Customer? <a href="customerSignup.php">SignUp now</a></p>
            </div>
        </div>
    </form>
</div>

</body>

</html>




