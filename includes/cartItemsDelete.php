<?php
include 'dbConfig.php';

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();

    $userID = $_POST['userid'];
    $shoppingCartID = $_POST['shoppingCartID'];

    try {
        // Delete user's association with the shopping cart
        $stmt = $conn->prepare("DELETE FROM user_has_shopping_cart WHERE shopping_cart_id = :cart_id");
        $stmt->execute(['cart_id' => $shoppingCartID]);

        // Delete the shopping cart item
        $stmt = $conn->prepare("DELETE FROM shopping_cart WHERE shopping_cart_id = :cart_id");
        $stmt->execute(['cart_id' => $shoppingCartID]);

        $response['message'] = 'Cart Item deleted';
        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = 'There is some problem in connection: ' . $e->getMessage();
        echo json_encode($response);
    }
    $pdo->close();
}
?>
