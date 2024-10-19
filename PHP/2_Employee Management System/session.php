<?php


session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['EId'])) {
    header("Location: login.php");
    exit;
}

?>
