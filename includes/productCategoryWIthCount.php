<?php
include 'dbConfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    // Handle POST request here, if needed
    // Handle GET request (fetch data from the database)
    $stmt = $conn->prepare("SELECT category.category_name,COUNT(*) AS count_per_category FROM product_master LEFT JOIN product_details ON product_master.product_detail_id = product_details.product_details_id LEFT JOIN product_master_has_variation_option ON product_master.product_master_id = product_master_has_variation_option.product_master_id LEFT JOIN variation_option ON product_master_has_variation_option.variation_option_id = variation_option.variant_option_id LEFT JOIN category ON category.id = product_details.category_id LEFT JOIN variation ON variation.variant_id = variation_option.variation_id WHERE product_master.is_Deleted = 0 GROUP BY category.id");
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
