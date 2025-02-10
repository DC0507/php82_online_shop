<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
require_once 'models.php';

// Instantiate database and product objects
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// Query products
$stmt = $product->read();
$num = $stmt->rowCount();

if ($num > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$price}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No products found.";
}

?>

<h1>Add Product</h1>
    <form action="add_product.php" method="post">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="price">Product Price:</label>
        <input type="text" id="price" name="price" required>
        <br>
        <input type="submit" value="Add Product">
    </form>    
</body>
</html>
