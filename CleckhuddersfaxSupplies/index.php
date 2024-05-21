<?php
// Redirect to homepage.php
session_destroy();
header("Location: PHP/HomePage/homepage.php");
exit; // Ensure that subsequent code is not executed after the redirect
?>
