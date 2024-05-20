<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify OTP
    $otp = $_POST['otp'];
    $savedOTP = $_SESSION['otp'];

    if ($otp == $savedOTP) {
        echo 'OTP Verified!';
    } else {
        echo 'Invalid OTP!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>

<body>
    <h2>OTP Verification</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="otp">Enter OTP:</label>
        <input type="text" name="otp" id="otp" required>
        <button type="submit">Verify</button>
    </form>
</body>

</html>