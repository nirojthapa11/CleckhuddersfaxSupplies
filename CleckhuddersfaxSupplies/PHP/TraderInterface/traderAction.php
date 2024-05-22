<?php
  include '../../partials/dbConnect.php';
  $db = new Database();
  $conn = $db->getConnection();
  session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addproduct'])) {
        // Extract form values
        $productName = $_POST['product-name'];
        $description = $_POST['description'];
        $price = $_POST['price'] ;
        $quantityPerItem = $_POST['quantity-per-item'];
        $stock = isset($_POST['stock']) ? $_POST['stock'] : '';
        $minOrder = isset($_POST['min-order']) ? $_POST['min-order'] : '';
        $maxOrder = isset($_POST['max-order']) ? $_POST['max-order'] : '';
        $allergyInfo = isset($_POST['allergy-info']) ? $_POST['allergy-info'] : '';
        $shop_id = $_SESSION['shop_id'];
        $category = isset($_POST['category']) ? $_POST['category'] : '';
   
        if (isset($_FILES['product-image']) && $_FILES['product-image']['error'] == 0) {
            $productImage = $_FILES['product-image'];
            $base64ImageData = base64_encode(file_get_contents($productImage['tmp_name']));
            $decodedImageData = base64_decode($base64ImageData);
        
            // Insert the product into the database with an empty BLOB for the image
            $query = "INSERT INTO PRODUCT (product_image, product_name, description, price, quantity_per_item, stock, min_order, max_order, allergy_info, shop_id, category_id, discount_id) 
                      VALUES (EMPTY_BLOB(), :productName, :description, :price, :quantityPerItem, :stock, :minOrder, :maxOrder, :allergyInfo, :shop_id, :category, 4001) 
                      RETURNING product_image INTO :imageData";
            $statement = oci_parse($conn, $query);
        
            // Bind the variables
            oci_bind_by_name($statement, ":productName", $productName);
            oci_bind_by_name($statement, ":description", $description);
            oci_bind_by_name($statement, ":price", $price);
            oci_bind_by_name($statement, ":quantityPerItem", $quantityPerItem);
            oci_bind_by_name($statement, ":stock", $stock);
            oci_bind_by_name($statement, ":minOrder", $minOrder);
            oci_bind_by_name($statement, ":maxOrder", $maxOrder);
            oci_bind_by_name($statement, ":allergyInfo", $allergyInfo);
            oci_bind_by_name($statement, ":shop_id", $shop_id);
            oci_bind_by_name($statement, ":category", $category);
        
            // Create a new descriptor for the BLOB
            $lob = oci_new_descriptor($conn, OCI_D_LOB);
            oci_bind_by_name($statement, ":imageData", $lob, -1, OCI_B_BLOB);
        
            // Execute the query
            $result = oci_execute($statement, OCI_DEFAULT);
            if ($result) {
                // Save the image data to the BLOB
                if ($lob->save($decodedImageData)) {
                    oci_commit($conn);
                    echo "Product added successfully.";
                    echo '<meta http-equiv="refresh" content="3">';
                } else {
                    oci_rollback($conn);
                    echo "Failed to save product image.";
                }
                $lob->free();
            } else {
                $error = oci_error($statement);
                echo "Error adding product: " . $error['message'];
            }
        } else {
            echo "Failed to upload product image.";
        }
        
    }





  


?>