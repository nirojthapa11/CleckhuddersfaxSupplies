<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

class MailerService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->setupMailer();
    }

    private function setupMailer()
    {
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';  // Specify your SMTP server
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'govindt7256@gmail.com'; // SMTP username
        $this->mail->Password = 'fjkaoxalbsdyzpmh';   // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
    }

    public function sendVerificationEmailToCustomer($toEmail, $otp)
    {
        try {
            $this->mail->setFrom($this->mail->Username, 'Cleckhuddersfax Supplies'); // Sender's email address and name
            $this->mail->addAddress($toEmail);                       // Recipient's email address
            $this->mail->Subject = 'Email Verification';
            $this->mail->isHTML(true);  // Set email format to HTML
            $this->mail->Body = '
                <html>
                <body style="font-family: Arial, sans-serif;">
                    <h2 style="color: #004080;">Welcome to Cleckhuddersfax Supplies!</h2>
                    <p style="color: #333;">Thank you for signing up with Cleckhuddersfax Supplies. To verify your email address, please use the following OTP:</p>
                    <h3 style="color: #004080;">OTP: ' . $otp . '</h3>
                    <p style="color: #333;">This OTP is valid for one-time use and will expire in 5 minutes.</p>
                    <p style="color: #333;">If you did not sign up for Cleckhuddersfax Supplies, please ignore this email.</p>
                    <p style="color: #333;">Happy shopping!</p>
                    <p style="color: #004080;">Cleckhuddersfax Supplies Team</p>
                </body>
                </html>
            ';
            $this->mail->send();
            return true; 
        } catch (Exception $e) {
            return false;
        }
    }

    public function forgotPassEmailVerification($toEmail, $otp)
    {
        try {
            $this->mail->setFrom($this->mail->Username, 'Cleckhuddersfax Supplies'); // Sender's email address and name
            $this->mail->addAddress($toEmail);                       // Recipient's email address
            $this->mail->Subject = 'Password Reset OTP';
            $this->mail->isHTML(true);  // Set email format to HTML
            $this->mail->Body = '
                <html>
                <body style="font-family: Arial, sans-serif;">
                    <h2 style="color: #004080;">Password Reset Request</h2>
                    <p style="color: #333;">We received a request to reset your password. To proceed, please use the following OTP:</p>
                    <h3 style="color: #004080;">OTP: ' . $otp . '</h3>
                    <p style="color: #333;">This OTP is valid for one-time use and will expire in 5 minutes.</p>
                    <p style="color: #333;">If you did not request a password reset, please ignore this email or contact our support.</p>
                    <p style="color: #004080;">Cleckhuddersfax Supplies Team</p>
                </body>
                </html>
            ';

            // Send email
            $this->mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return false; // Failed to send email
        }
    }

    public function signupEmailVerification($toEmail, $otp)
    {
        try {
            $this->mail->setFrom($this->mail->Username, 'Cleckhuddersfax Supplies'); // Sender's email address and name
            $this->mail->addAddress($toEmail);                       // Recipient's email address
            $this->mail->Subject = 'Welcome to Cleckhuddersfax Supplies - Verify Your Email';
            $this->mail->isHTML(true);  // Set email format to HTML
            $this->mail->Body = '
                <html>
                <body style="font-family: Arial, sans-serif;">
                    <h2 style="color: #004080;">Welcome to Cleckhuddersfax Supplies!</h2>
                    <p style="color: #333;">Thank you for signing up with us. To complete your registration, please verify your email address by using the following OTP:</p>
                    <h3 style="color: #004080;">OTP: ' . $otp . '</h3>
                    <p style="color: #333;">This OTP is valid for one-time use and will expire in 5 minutes.</p>
                    <p style="color: #333;">By verifying your email, you will gain access to exclusive offers, updates, and more.</p>
                    <p style="color: #004080;">Join us and start exploring!</p>
                    <p style="color: #004080;">Cleckhuddersfax Supplies Team</p>
                </body>
                </html>
            ';

            // Send email
            $this->mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return false; // Failed to send email
        }
    }

    public function custProfileUpdateEmailVerification($toEmail, $otp)
    {
        try {
            $this->mail->setFrom($this->mail->Username, 'Cleckhuddersfax Supplies'); // Sender's email address and name
            $this->mail->addAddress($toEmail);                       // Recipient's email address
            $this->mail->Subject = 'Cleckhuddersfax Supplies - Email Verification for Profile Update';
            $this->mail->isHTML(true);  // Set email format to HTML
            $this->mail->Body = '
                <html>
                <body style="font-family: Arial, sans-serif;">
                    <h2 style="color: #004080;">Cleckhuddersfax Supplies - Profile Update Verification</h2>
                    <p style="color: #333;">You recently requested to update your profile on Cleckhuddersfax Supplies. To complete this process, please verify your email address by using the following OTP:</p>
                    <h3 style="color: #004080;">OTP: ' . $otp . '</h3>
                    <p style="color: #333;">This OTP is valid for one-time use and will expire in 5 minutes.</p>
                    <p style="color: #333;">By verifying your email, you ensure the security of your account and access to updated information.</p>
                    <p style="color: #004080;">Thank you for keeping your information up to date!</p>
                    <p style="color: #004080;">Cleckhuddersfax Supplies Team</p>
                </body>
                </html>
            ';

            // Send email
            $this->mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return false; // Failed to send email
        }
    }

    public function traderSignupEmailVerification($email, $traderSignupOtp)
    {
        try {
            $this->mail->setFrom($this->mail->Username, 'Cleckhuddersfax Supplies'); // Sender's email address and name
            $this->mail->addAddress($email);                       // Recipient's email address
            $this->mail->Subject = 'Welcome to Cleckhuddersfax Supplies - Verify Your Trader Account';
            $this->mail->isHTML(true);  // Set email format to HTML
            $this->mail->Body = '
                <html>
                <body style="font-family: Arial, sans-serif;">
                    <h2 style="color: #004080;">Welcome to Cleckhuddersfax Supplies, Valued Trader!</h2>
                    <p style="color: #333;">We are excited to have you join our community of trusted traders. To complete your trader account setup, please verify your email address by using the following OTP:</p>
                    <h3 style="color: #004080;">OTP: ' . $traderSignupOtp . '</h3>
                    <p style="color: #333;">This OTP is valid for one-time use and will expire in 5 minutes.</p>
                    <p style="color: #333;">As a verified trader, you will gain access to exclusive features, advanced trading tools, and special offers tailored for your business.</p>
                    <p style="color: #004080;">Why Verify Your Email?</p>
                    <ul style="color: #333;">
                        <li>Access to a wider range of products.</li>
                        <li>Exclusive trader discounts and promotions.</li>
                        <li>Priority customer support.</li>
                        <li>Stay updated with the latest market trends.</li>
                    </ul>
                    <p style="color: #333;">Thank you for choosing Cleckhuddersfax Supplies. We look forward to a successful partnership!</p>
                    <p style="color: #004080;">Warm regards,</p>
                    <p style="color: #004080;">Cleckhuddersfax Supplies Team</p>
                </body>
                </html>
            ';

            // Send email
            $this->mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return false; // Failed to send email
        }
    }

    public function sendOrderReceipt($toEmail, $orderDetails)
    {
        try {
            $this->mail->setFrom($this->mail->Username, 'Cleckhuddersfax Supplies'); // Sender's email address and name
            $this->mail->addAddress($toEmail);                       // Recipient's email address
            $this->mail->Subject = 'Order Receipt - Cleckhuddersfax Supplies';
            $this->mail->isHTML(true);  // Set email format to HTML
            
// Construct the email body with order summary
$emailBody = '
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #ffffff;
                padding: 20px;
                margin: 0;
                background-color: #ff5722;
                border-radius: 10px 10px 0 0;
                text-align: center;
            }
            p {
                color: #333333;
                padding: 0 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 15px;
                text-align: left;
            }
            th {
                background-color: #ff5722;
                color: #ffffff;
            }
            tr:nth-child(even) {
                background-color: #ffe0b2;
            }
            .total {
                font-weight: bold;
                text-align: right;
                background-color: #ffc107;
            }
            .thank-you {
                padding: 20px;
                text-align: center;
                background-color: #ff5722;
                color: #ffffff;
                border-radius: 0 0 10px 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Order Receipt</h2>
            <p>Thank you for your order with Cleckhuddersfax Supplies. Below is the summary of your order:</p>
            <table border="1">
                <tr>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>';

// Loop through order details to construct rows for each product
foreach ($orderDetails as $key => $product) {
    if ($key === 'total') {
        continue; // Skip the total key
    }

    $emailBody .= '
                <tr>
                    <td>' . $product['PRODUCT_NAME'] . '</td>
                    <td>$' . $product['PRICE'] . '</td>
                    <td>' . $product['QUANTITY'] . '</td>
                    <td>$' . number_format($product['PRICE'] * $product['QUANTITY'], 2) . '</td>
                </tr>';
}

// Add total summary
$emailBody .= '
                <tr class="total">
                    <td colspan="3">Total:</td>
                    <td>$' . number_format($orderDetails['total'], 2) . '</td>
                </tr>
            </table>
            <p class="thank-you">Thank you for shopping with us!</p>
        </div>
    </body>
    </html>
';





            

            // Set email body
            $this->mail->Body = $emailBody;

            // Send email
            $this->mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return false; // Failed to send email
        }
    }



}