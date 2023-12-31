<?php
session_start();
include 'includes/dbConfig.php';

if (isset($_POST['login_action'])) {
    $conn = $pdo->open();

    $username =  $_POST['email'];
    $password = $_POST['password'];

    try {
        $password = md5($password);
        $stmt = $conn->prepare("SELECT * FROM user WHERE email=:email AND password=:password");
        $stmt->execute(['email' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['useremail'] = $user['email'];
            $_SESSION['user'] = json_encode($user);
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
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
