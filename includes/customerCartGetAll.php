<?php
include 'dbConfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    // Handle POST request here, if needed
    // Handle GET request (fetch data from the database)
    $userID = $_POST['userid'];
    $stmt = $conn->prepare("SELECT * FROM user_has_shopping_cart LEFT JOIN shopping_cart ON user_has_shopping_cart.shopping_cart_id = shopping_cart.shopping_cart_id LEFT JOIN product_master ON shopping_cart.product_master_id = product_master.product_master_id LEFT JOIN product_details ON product_master.product_detail_id = product_details.product_details_id WHERE user_has_shopping_cart.user_id = :userid");
    $stmt->execute(['userid'=> $userID]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array

    // Close the database connection
    $pdo->close();

    // Encode the fetched data as JSON and send it as the response
    echo json_encode($data);
} else {
    echo json_encode("This is not POST METHOD");
}
?>
