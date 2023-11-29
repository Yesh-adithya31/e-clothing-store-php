<?php
session_start();
include 'includes/dbConfig.php';

if (isset($_POST['login_action'])) {
    $conn = $pdo->open();

    $username =  $_POST['email'];
    $password = $_POST['password'];

    try {
        $password = md5($password);
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email=:email AND password=:password");
        $stmt->execute(['email' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['success'] = "You are now logged in";
            header('location: productlist.php');
        } else {
            // User not found in the database
            $_SESSION['error'] = "Wrong username/password combination";
        }
    } catch (PDOException $e) {
        // echo "There is some problem in connection: " . $e->getMessage();
        $_SESSION['error'] =  "There is some problem in connection: " . $e->getMessage();
    }

    $pdo->close();
}
