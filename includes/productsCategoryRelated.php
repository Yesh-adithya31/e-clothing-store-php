<?php
include 'dbConfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    // Handle POST request here, if needed
    // Handle GET request (fetch data from the database)
    $categoryID = $_POST['category_id'];
    $stmt = $conn->prepare("SELECT * FROM product_details LEFT JOIN product_master ON product_details.product_details_id = product_master.product_detail_id WHERE product_details.category_id = :cat_id");
    $stmt->execute(['cat_id' =>  $categoryID]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array

    // Close the database connection
    $pdo->close();

    // Encode the fetched data as JSON and send it as the response
    echo json_encode($data);
} else {
    echo json_encode("This is not POST METHOD");
}
?>
