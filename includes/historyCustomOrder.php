<?php
include 'dbConfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    $userID = $_POST['userid'];
    // Handle POST request here, if needed
    // Handle GET request (fetch data from the database)
    $stmt = $conn->prepare("SELECT * FROM customrequest LEFT JOIN shipping_address ON  customrequest.shipping_address_id = shipping_address.shipping_add_id WHERE user_id = :userid");
    $stmt->execute(['userid' => $userID]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array

    // Close the database connection
    $pdo->close();

    // Encode the fetched data as JSON and send it as the response
    echo json_encode($data);
} else {
    echo json_encode("This is not POST METHOD");
}
?>
