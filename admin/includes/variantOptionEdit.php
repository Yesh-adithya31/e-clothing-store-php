<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    $varOptionID =  $_POST['varOptID'];
    $variantID =  $_POST['variantSelect'];

    if (isset($_POST['optionsName']) && is_array($_POST['optionsName'])) {

        $options = $_POST['optionsName'];
        try {
            foreach ($options as $option) {
                $stmt = $conn->prepare("UPDATE variation_option SET variation_id = :var_id, value = :val WHERE variant_option_id=:var_opt_id");
                $stmt->execute(['var_id' => $variantID, 'val' => $option, 'var_opt_id' => $varOptionID]);
                $response = [
                    'message' => 'Variant options updated successfully',
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
    } else {

        $response = [
            'message' => 'There is some problem in connection: ',
        ];
        echo json_encode($response);
    }

    $pdo->close();
}
