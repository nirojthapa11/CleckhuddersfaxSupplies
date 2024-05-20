<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'MailerService.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process signup form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format';
        exit;
    }

    // Generate OTP
    $otp = generateOTP();

    // Save user details and OTP in session
    $_SESSION['user_details'] = array(
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'otp' => $otp
    );

    // Send verification email
    $mailer = new MailerService();
    $sent = $mailer->sendVerificationEmailToCustomer($email, $otp);

    if ($sent) {
        // Redirect to OTP verification page
        header("Location: otp_verification.php");
        exit;
    } else {
        echo 'Failed to send verification email.';
    }
}

function generateOTP($length = 6)
{
    return rand(pow(10, $length - 1), pow(10, $length) - 1);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body>
    <h2>Signup</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="address">Address:</label>
        <textarea name="address" id="address" required></textarea><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required><br><br>

        <button type="submit">Signup</button>
    </form>
</body>

</html>