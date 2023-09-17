<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $categoryname =  $_POST['category_name'];

    try {
        $stmt = $conn->prepare("INSERT INTO category(category_name, is_Deleted) VALUES(:cat_name,0)");
        $stmt->execute(['cat_name' => $categoryname]);
        $userid = $conn->lastInsertId();

        if ($userid) {
            $response = [
                'message' => 'Category created successfully',
            ];
        } else {
            $response = [
                'message' => 'Error occured!!',
            ];
        }
        echo json_encode($response);
    } catch (PDOException $e) {
        // echo "There is some problem in connection: " . $e->getMessage();
        $response = [
            'message' => 'There is some problem in connection: ' . $e->getMessage(),
        ];
        echo json_encode($response);
    }

    $pdo->close();
}
