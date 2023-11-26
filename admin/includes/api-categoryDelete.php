<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $categoryID = $_POST['category_id'];

    try {
        $stmt = $conn->prepare("UPDATE category SET is_Deleted = 1 WHERE id = :cat_id");
        $stmt->execute(['cat_id' => $categoryID]);
        $response = [
            'message' => 'Category deleted successfully',
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
