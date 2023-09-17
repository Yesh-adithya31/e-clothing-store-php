<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
    header('location: index.php'); // Redirect to the login page if not logged in
    exit;
}
