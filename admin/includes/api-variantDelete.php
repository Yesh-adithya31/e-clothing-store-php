<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $variantID = $_POST['var_id'];

    try {
        $stmt = $conn->prepare("DELETE FROM variation WHERE variant_id = :var_id");
        $stmt->execute(['var_id' => $variantID]);
        $response = [
            'message' => 'Variant deleted successfully',
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
