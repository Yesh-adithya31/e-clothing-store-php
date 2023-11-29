
<?php
include 'dbConfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    $orderID = $_POST['orderid'];
    // Handle POST request here, if needed
    // Handle GET request (fetch data from the database)
    $stmt = $conn->prepare("SELECT * FROM order_details LEFT JOIN bills ON order_details.order_id = bills.order_details_id LEFT JOIN product_master ON bills.product_master_id = product_master.product_master_id LEFT JOIN product_details ON product_master.product_detail_id = product_details.product_details_id WHERE order_details.order_id =:orderid");
    $stmt->execute(['orderid' => $orderID]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array

    // Close the database connection
    $pdo->close();

    // Encode the fetched data as JSON and send it as the response
    echo json_encode($data);
} else {
    echo json_encode("This is not POST METHOD");
}
?>
