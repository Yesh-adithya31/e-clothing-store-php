<?php
session_start();
unset($_SESSION['useremail']);
unset($_SESSION['user']);
header('location: ../index.php');
die();
?>