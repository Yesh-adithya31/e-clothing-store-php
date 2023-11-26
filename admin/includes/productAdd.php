<?php
include 'dbConfig.php';


$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = $pdo->open();
    $conn2 = $pdo->open();
    $conn3 = $pdo->open();
    $uploaddir = '../../uploads/';
    $uploadfile = $uploaddir . basename($_FILES['productimage']['name']);

    if (!file_exists($uploaddir)) {
        mkdir($uploaddir, 0777, true); // Create directory with full permissions (adjust permissions as needed)
    }

    $productname =  $_POST['productname'];
    $cmbcategory =  $_POST['cmbcategory'];
    $description =  $_POST['description'];
    $productimage = basename($_FILES["productimage"]["name"]);

    if (move_uploaded_file($_FILES["productimage"]["tmp_name"], $uploadfile)) {
        // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        try {
            $stmt = $conn->prepare("INSERT INTO product_details(category_id, product_name, description, product_image) VALUES(:cat_id,:pro_name, :desc, :img)");
            $stmt->execute(['cat_id' => $cmbcategory, 'pro_name' => $productname, 'desc' => $description, 'img' => $productimage]);
            $product_detail_id = $conn->lastInsertId();
            // echo "Last ID: " . $product_detail_id;

            if ($product_detail_id) {
                $SKU =  $_POST['SKU'];
                $qty =  $_POST['qty'];
                $price =  $_POST['price'];
                $stmt2 = $conn2->prepare("INSERT INTO product_master(SKU, product_detail_id, qty_in_stock, price, is_deleted) VALUES(:sku,:pro_de_id, :qty, :price, 0)");
                $stmt2->execute(['sku' => $SKU, 'pro_de_id' => $product_detail_id, 'qty' => $qty, 'price' => $price]);
                $product_master_id = $conn2->lastInsertId();
                // echo "Last master ID: " . $product_master_id;
                if ($product_master_id) {
                    $optionid =  $_POST['cmbvariationoption'];
                    $stmt3 = $conn3->prepare("INSERT INTO product_master_has_variation_option(product_master_id, variation_option_id) VALUES(:pro_m_id,:var_opt_id)");
                    $stmt3->execute(['pro_m_id' => $product_master_id, 'var_opt_id' => $optionid]);
                    $response = [
                        'message' => 'Product details added successfully!!!',
                    ];
                } else {
                    $response = [
                        'message' => 'Error occured on adding product master details!!',
                    ];
                }
            } else {
                $response = [
                    'message' => 'Error occured on adding product details!!',
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
        echo "Sorry, there was an error uploading your file.";
        $response = [
            'message' => 'Sorry, there was an error uploading your file. ',
        ];
        echo json_encode($response);
    }
    $pdo->close();
}
