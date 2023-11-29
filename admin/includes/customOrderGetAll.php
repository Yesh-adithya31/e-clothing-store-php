<?php
include 'dbConfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    // Handle POST request here, if needed
    // Handle GET request (fetch data from the database)
    $stmt = $conn->prepare("SELECT * FROM customrequest LEFT JOIN user ON customrequest.user_id = user.user_id LEFT JOIN shipping_address ON shipping_address.shipping_add_id = customrequest.shipping_address_id");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array

    // Close the database connection
    $pdo->close();

    // Encode the fetched data as JSON and send it as the response
    echo json_encode($data);
} else {
    echo json_encode("This is not POST METHOD");
}
?>
