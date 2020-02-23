<?php

$region = $_POST["region"];
$name = $_POST["name"];
$manager = $_POST["manager"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "INSERT INTO PITTEXPRESS.Store (address, region_id, manager_id) VALUES ('".$name."','".$region."','".$manager."');";
$conn->query($sql);
$sql = "SELECT store_id FROM PITTEXPRESS.Store WHERE address='".$name."' AND region_id='".$region."' AND manager_id='".$manager."' LIMIT 1;";
$result = $conn->query($sql);
$store_id = -1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $store_id = $row["store_id"];
}

$sql = "UPDATE PITTEXPRESS.Staff SET region=".$region.", store = ".$store_id." WHERE id = ".$manager.";";

$conn->query($sql);

mysqli_close($conn);
?>