<?php
function getDbConnection() {
    $conn = oci_connect('hembikram', 'Hem#123', '//localhost/xe');
    if (!$conn) {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }
    return $conn;
}
?>
