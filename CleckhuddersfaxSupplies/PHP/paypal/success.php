<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../partials/dbConnect.php';
$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['date']) && isset($_GET['slot'])) {
    $collection_date = $_GET['date'];
    $collection_slot = $_GET['slot'];
    $total_price = $_GET['amount'] ?? null;
    $customer_username = $_GET['cusername'] ?? null;
    $customer_id = $db->getCustomerIdUsingUsername($customer_username);
    $no_of_items = $_GET['qty'] ?? null;
    $order_status = "created";

    // Insert order into the orders table
    $sql = "INSERT INTO orders (order_date, order_status, no_of_items, collection_date, collection_slot, customer_id, total_price) 
        VALUES (CURRENT_TIMESTAMP, :order_status, :no_of_items, TO_DATE(:collection_date, 'YYYY-MM-DD'), :collection_slot, :customer_id, :total_price)";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':order_status', $order_status);
    oci_bind_by_name($stmt, ':no_of_items', $no_of_items);
    oci_bind_by_name($stmt, ':collection_date', $collection_date);
    oci_bind_by_name($stmt, ':collection_slot', $collection_slot);
    oci_bind_by_name($stmt, ':customer_id', $customer_id);
    oci_bind_by_name($stmt, ':total_price', $total_price);
    oci_execute($stmt);
    oci_free_statement($stmt);

    // Update slot count in the slots table
    $sql = "MERGE INTO slots s
            USING (SELECT TO_DATE(:collection_date, 'YYYY-MM-DD') AS collection_date, :collection_slot AS collection_slot FROM dual) d
            ON (s.collection_date = d.collection_date AND s.collection_slot = d.collection_slot)
            WHEN MATCHED THEN
                UPDATE SET orders_count = orders_count + 1
            WHEN NOT MATCHED THEN
                INSERT (collection_date, collection_slot, orders_count) VALUES (d.collection_date, d.collection_slot, 1)";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':collection_date', $collection_date);
    oci_bind_by_name($stmt, ':collection_slot', $collection_slot);
    oci_execute($stmt);
    oci_free_statement($stmt);

    oci_close($conn);

    echo 'Order placed and payment successful!';
} else {
    echo 'Payment details not received.';
}
?>
