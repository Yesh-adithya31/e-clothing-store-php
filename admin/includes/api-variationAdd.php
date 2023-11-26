<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $variationname =  $_POST['variantName'];
    $cat_id =  $_POST['cmbCategory'];

    try {
        $stmt = $conn->prepare("INSERT INTO variation(category_id, name) VALUES(:cat_id,:var_name)");
        $stmt->execute(['cat_id' => $cat_id, 'var_name'=> $variationname]);
        $userid = $conn->lastInsertId();

        if ($userid) {
            $response = [
                'message' => 'Variation created successfully',
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
