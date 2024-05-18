<?php
$connection = oci_connect("mohan", "Khati#123", "//localhost/xe");

if (!$connection) {
    $error_message = oci_error();
    echo "Failed to connect to Oracle: " . $error_message['message'];
    exit();
}

// Set the product ID
$productId = 2;

// Retrieve BLOB data from the database
$qry = "SELECT product_image FROM PRODUCT WHERE product_id = :product_id";
$stid = oci_parse($connection, $qry);
oci_bind_by_name($stid, ":product_id", $productId);
oci_execute($stid);

// Fetch the BLOB data
$row = oci_fetch_assoc($stid);
if ($row) {
    $imageData = $row['PRODUCT_IMAGE']->load();

    // Encode the BLOB data as base64
    $encodedImageData = base64_encode($imageData);

    // Determine the image type based on the first few bytes of the image data
    $header = bin2hex(substr($imageData, 0, 4));
    $imageType = 'image/jpeg'; // default to JPEG
    if (strpos($header, 'ffd8') === 0) {
        $imageType = 'image/jpeg'; // JPEG
    } elseif (strpos($header, '89504e47') === 0) {
        $imageType = 'image/png'; // PNG
    }

    // Display the image using an HTML img tag
    echo '<img src="data:' . $imageType . ';base64,' . $encodedImageData . '" alt="Product Image">';
} else {
    echo "No image found for product ID " . htmlspecialchars($productId) . ".";
}

oci_free_statement($stid);
oci_close($connection);
?>
