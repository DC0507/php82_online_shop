<?php
require_once 'models.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Initialize database connection
    $database = new Database();
    $db = $database->getConnection();

    // Initialize product object
    $product = new Product($db);

    // Set product properties
    $product->name = $name;
    $product->price = $price;

    // Create product
    if ($product->create()) {
        echo "Product was created.";
    } else {
        echo "Unable to create product.";
    }
}
?>