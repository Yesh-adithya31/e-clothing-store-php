<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $categoryID = $_POST['categoryID'];
    $categoryname =  $_POST['categoryName'];

    try {
        $stmt = $conn->prepare("UPDATE category SET category_name = :cat_name WHERE id = :cat_id");
        $stmt->execute(['cat_name'=> $categoryname, 'cat_id' => $categoryID]);
        $response = [
            'message' => 'Category updated successfully',
        ];
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
