<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['user']);
header('location: ../index.php');
die();
?>