<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $categoryID = $_POST['categorySelect'];
    $variantID =  $_POST['variantID'];
    $variantName =  $_POST['variantName'];

    try {
        $stmt = $conn->prepare("UPDATE variation SET category_id = :cat_id, name = :var_name WHERE variant_id = :var_id");
        $stmt->execute(['cat_id'=> $categoryID,'var_name' => $variantName ,'var_id' => $variantID]);
        $response = [
            'message' => 'Variant details updated successfully',
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
