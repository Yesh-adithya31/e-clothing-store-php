<?php
include 'dbConfig.php';

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    $conn2 = $pdo->open();

    $userID =  $_POST['userID'];
    $customOrder =  $_POST['customOrder'];

    $streetNumber = $_POST['streetNumber'];
    $addLine1 = $_POST['addLine1'];
    $addLine2 = $_POST['addLine2'];
    $postCode = $_POST['postCode'];
    $district = $_POST['district'];

    try {
            $stmt = $conn->prepare("INSERT INTO shipping_address(street_number, address_line1,address_line2,postal_code,district) VALUES(:strNo,:add1, :add2, :postCode, :district)");
            $stmt->execute(['strNo' => $streetNumber,'add1' => $addLine1,'add2' => $addLine2,'postCode' => $postCode,'district' => $district]);
            $shippingAddID = $conn->lastInsertId();
    
            if ($shippingAddID) {
                $stmt2 = $conn2->prepare("INSERT INTO customrequest(user_id, shipping_address_id,request_note,order_status) VALUES(:userid,:shipAdd,:note,'Order Plced')");
                $stmt2->execute(['userid' => $userID, 'shipAdd' => $shippingAddID, 'note' => $customOrder]);
                $response = [
                    'message' => 'Custom Requested Item has been placed!!!',
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
