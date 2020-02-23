<?php
$name = $_POST["name"];
$manager = $_POST["manager"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "INSERT INTO PITTEXPRESS.Region (region_name, manage_id) VALUES ('".$name."','".$manager."');";
$conn->query($sql);

$sql = "SELECT region_id FROM PITTEXPRESS.Region WHERE region_name='".$name."' LIMIT 1;";
$result = $conn->query($sql);
$region_id = -1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $region_id = $row["region_id"];
}

$sql = "UPDATE PITTEXPRESS.Staff SET region = ".$region_id.", store=null WHERE id = ".$manager.";";
$conn->query($sql);

mysqli_close($conn);
?>