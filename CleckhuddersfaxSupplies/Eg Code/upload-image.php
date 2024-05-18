<?php
$connection = oci_connect("mohan", "Khati#123", "//localhost/xe");

if (!$connection) {
    $error_message = oci_error();
    echo "Failed to connect to Oracle: " . $error_message['message'];
    exit();
}

if (isset($_POST['submit']) && isset($_FILES['product_image']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $image = $_FILES['product_image']['tmp_name'];

    if ($image) {
        $imageData = file_get_contents($image);

        $qry = "UPDATE PRODUCT SET product_image = EMPTY_BLOB() WHERE product_id = :product_id RETURNING product_image INTO :image";
        $stid = oci_parse($connection, $qry);

        $blob = oci_new_descriptor($connection, OCI_D_LOB);
        oci_bind_by_name($stid, ":image", $blob, -1, OCI_B_BLOB);
        oci_bind_by_name($stid, ":product_id", $productId);

        oci_execute($stid, OCI_DEFAULT); // Use OCI_DEFAULT to defer the commit

        if ($blob->save($imageData)) {
            oci_commit($connection);
            echo "Image uploaded successfully for product ID " . htmlspecialchars($productId) . ".";
        } else {
            echo "Failed to save the BLOB data.";
        }

        oci_free_statement($stid);
        $blob->free();
        oci_close($connection);
    } else {
        echo "Failed to upload image.";
    }
} else {
    echo "No image selected or product ID missing.";
}
?>
