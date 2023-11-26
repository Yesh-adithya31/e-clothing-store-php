<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $variantID =  $_POST['cmbVariant'];
    if (isset($_POST['optionsName']) && is_array($_POST['optionsName'])) {
        
        $options = $_POST['optionsName'];
        try {
            foreach ($options as $option) {
                $stmt = $conn->prepare("INSERT INTO  variation_option (variation_id,value) VALUES(:var_id,:val)");
                $stmt->execute(['var_id' => $variantID, 'val' => $option]);
                $id = $conn->lastInsertId();
    
                if ($id) {
                    $response = [
                        'message' => 'Variant options created successfully',
                    ];
                } else {
                    $response = [
                        'message' => 'Error occured!!',
                    ];
                }
            }
            echo json_encode($response);
        } catch (PDOException $e) {
            // echo "There is some problem in connection: " . $e->getMessage();
            $response = [
                'message' => 'There is some problem in connection: ' . $e->getMessage(),
            ];
            echo json_encode($response);
        }
    }else{

        $response = [
            'message' => 'There is some problem in connection: ',
        ];
        echo json_encode($response);
    }



    $pdo->close();
}
