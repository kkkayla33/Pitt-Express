<?php
$product = $_POST["product"];
$inventory = $_POST["inventory"];
$store_id = $_POST["sid"];
$price = $_POST["price"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "INSERT INTO PITTEXPRESS.Inventory (product_id, store_id, num, price) VALUES ('".$product."','".$store_id."','".$inventory."','".$price."');";
$conn->query($sql);
mysqli_close($conn);
?>