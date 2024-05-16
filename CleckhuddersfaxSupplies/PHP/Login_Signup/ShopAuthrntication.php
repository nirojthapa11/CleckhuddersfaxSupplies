<?php
session_start();
$conn = oci_connect('hembikram', 'Hem#123', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $shopName = $_POST['shop-name'];
    $phoneNumber = $_POST['phone-number'];
    $email = $_POST['shop-email'];
    $description = $_POST['description'];

    // Insert data into the database
    $stmt = oci_parse($conn, "INSERT INTO SHOP (SHOP_NAME, PHONE, Shop_Email, DESCRIPTION, Registration_Date) VALUES (:shopName, :phoneNumber, :email, :description, SYSDATE)");
    oci_bind_by_name($stmt, ':shopName', $shopName);
    oci_bind_by_name($stmt, ':phoneNumber', $phoneNumber);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':description', $description);

    $result = oci_execute($stmt);
    
    if ($result) {
        // Redirect or display a success message
        echo "<script>alert('Shop registered successfully!'); window.location.href='login.php';</script>";
    } else {
        $error = oci_error($stmt);
        echo "Error inserting data: " . $error['message'];
    }
    
    oci_free_statement($stmt);
    oci_close($conn);
}
?>
