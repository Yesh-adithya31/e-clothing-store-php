<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $variantOptID = $_POST['varOpt_id'];

    try {
        $stmt = $conn->prepare("DELETE FROM variation_option WHERE variant_option_id = :var_opt_id");
        $stmt->execute(['var_opt_id' => $variantOptID]);
        $response = [
            'message' => 'Variant options deleted successfully',
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
