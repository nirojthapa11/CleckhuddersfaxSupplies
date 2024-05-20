<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enteredOtp = htmlspecialchars(trim($_POST['otp']));

    if (isset($_SESSION['otp']) && $enteredOtp == $_SESSION['otp']) {
        header("Location: passwordReset.php");
        exit;
    } else {
        $_SESSION['error'] = 'Invalid OTP. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OTP Verification</title>
    <link rel="stylesheet" href="otpVerification.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <header>
            <i class="bx bxs-check-shield"></i>
        </header>
        <h4>Enter OTP Code</h4>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="otpVerification.php" method="POST" id="otpForm">
            <div class="input-field">
                <input type="number" name="otp_digit[]" maxlength="1" required />
                <input type="number" name="otp_digit[]" maxlength="1" disabled />
                <input type="number" name="otp_digit[]" maxlength="1" disabled />
                <input type="number" name="otp_digit[]" maxlength="1" disabled />
                <input type="number" name="otp_digit[]" maxlength="1" disabled />
                <input type="number" name="otp_digit[]" maxlength="1" disabled />
            </div>
            <input type="hidden" name="otp" id="otp">
            <button type="submit">Verify OTP</button>
        </form>
    </div>


    <script>
    const inputs = document.querySelectorAll("input[name='otp_digit[]']"),
        button = document.querySelector("button");
    // iterate over all inputs
    inputs.forEach((input, index1) => {
        input.addEventListener("keyup", (e) => {

            console.log("Key pressed in input", index1 + 1);

            const currentInput = input,
                nextInput = input.nextElementSibling,
                prevInput = input.previousElementSibling;
            if (currentInput.value.length > 1) {
                currentInput.value = "";
                return;
            }
            if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                nextInput.removeAttribute("disabled");
                nextInput.focus();
            }
            if (e.key === "Backspace") {
                inputs.forEach((input, index2) => {
                    if (index1 <= index2 && prevInput) {
                        input.setAttribute("disabled", true);
                        input.value = "";
                        prevInput.focus();
                    }
                });
            }
            if (!inputs[5].disabled && inputs[5].value !== "") {
                button.classList.add("active");
                return;
            }
            button.classList.remove("active");
        });
    });

    document.getElementById('otpForm').addEventListener('submit', function(e) {
        const otp = Array.from(inputs).map(input => input.value).join('');
        document.getElementById('otp').value = otp;
        console.log("Generated OTP:", otp); // Log the generated OTP
    });

    window.addEventListener("load", () => inputs[0].focus());
    </script>


</body>

</html>