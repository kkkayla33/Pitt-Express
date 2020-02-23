<?php
$staff_id = $_POST["sid"];
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$name = $_POST["name"];
$salary = $_POST["salary"];
$region = $_POST["region"];
$store = $_POST["store"];
$email = $_POST["email"];
$address = $_POST["address"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "UPDATE PITTEXPRESS.Staff SET name='".$name."', username='".$username."', password='".$pwd."', region='".$region."', store='".$store."', address='".$address."', email='".$email."', salary='".$salary."' WHERE id='".$staff_id."';";
$conn->query($sql);
?>