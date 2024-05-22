<?php
session_start();

// Connect to Oracle database
$conn = oci_connect('hembikram', 'Hem#123', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    $_SESSION['error'] = $m['message'];
    header("Location: traderInterface.php"); // Redirect back to the form page
    exit();
}

// Fetch shop details
$traderId = $_SESSION['username'];

$query_shop = "SELECT * FROM Shop WHERE Trader_Id = :trader_id";
$statement_shop = oci_parse($conn, $query_shop);
oci_bind_by_name($statement_shop, ':trader_id', $traderId);
oci_execute($statement_shop);
$row_shop = oci_fetch_assoc($statement_shop);

if (!$row_shop) {
    $_SESSION['error'] = "Shop details not found.";
    header("Location: traderInterface.php");
    exit();
}

$shopId = $row_shop['SHOP_ID'];

if (isset($_POST['addproduct'])) {
    // Retrieve and sanitize form data
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $productStock = $_POST['productStock'];
    $minOrder = $_POST['minOrder'];
    $maxOrder = $_POST['maxOrder'];
    $allergy = $_POST['allergy'];
    $categories = $_POST['categories'];
    $productPhoto = $_FILES['productPhoto']['name'];

    // Check if product name already exists
    $query_check = "SELECT PRODUCT_NAME FROM Product WHERE PRODUCT_NAME = :productName";
    $statement_check = oci_parse($conn, $query_check);
    oci_bind_by_name($statement_check, ':productName', $productName);
    oci_execute($statement_check);
    $row = oci_fetch_assoc($statement_check);

    if ($row !== false) {
        $_SESSION['error'] = "Product name already exists. Please use a different name.";
        header("Location: view_product_detail.php");
        exit();
    }

    // Retrieve form data
    $productName = $_POST['product-name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $minOrder = $_POST['min-order'];
    $maxOrder = $_POST['max-order'];
    $productImage = $_POST['product-image'];
    $allergyInfo = $_POST['allergy-info'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Prepare SQL statement
    $query = "INSERT INTO PRODUCT (Product_Name, Product_Image, Description, Price, Stock, Min_Order, Max_Order, Allergy_info, Category_Id) 
    VALUES ($productName, $productImage, $description, $price, $stock, $minOrder, $maxOrder, $allergyInfo, $category)";
    $stid = oci_parse($conn, $query);

    // Bind parameters
    // oci_bind_by_name($stid, ":productName", $productName);
    // oci_bind_by_name($stid, ":productImage", $productImage);
    // oci_bind_by_name($stid, ":description", $description);
    // oci_bind_by_name($stid, ":price", $price);
    // oci_bind_by_name($stid, ":stock", $stock);
    // oci_bind_by_name($stid, ":minOrder", $minOrder);
    // oci_bind_by_name($stid, ":maxOrder", $maxOrder);
    // oci_bind_by_name($stid, ":allergyInfo", $allergyInfo);
    // oci_bind_by_name($stid, ":category", $category);

    // Execute SQL statement
    $result = oci_execute($stid);
    if ($result) {
        $_SESSION['notification'] = "Product added successfully!";
    } else {
        $_SESSION['error'] = "Failed to add product.";
    }

    // Close Oracle connection
    oci_close($conn);

    // Redirect back to the trader interface page
    header("Location: traderInterface.php");
    exit();
?>