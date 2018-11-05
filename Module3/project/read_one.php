<?php
// 1. database credentials
$host = "cscott.centralus.cloudapp.azure.com";
$db_name = "demo";
$username = "test";
$password = "testing1234";

// 2. connect to database
$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);

// 3. prepare select query
$query = "SELECT name, id, color, price, inventory, availability FROM products WHERE id = ? LIMIT 0,1";
$stmt = $con->prepare( $query );

// 4. sample product ID
$product_id=1;

// 5. this is the first question mark in the query
$stmt->bindParam(1, $product_id);

// 6. execute our query
$stmt->execute();

// 7. store retrieved row to the 'row' variable
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// 8. show data to user
echo "<div>Name: " . $row['name'] . "</div>";
echo "<div>ID: " . $row['id'] . "</div>";
echo "<div>Price: $" . $row['price'] . "</div>";
?>
