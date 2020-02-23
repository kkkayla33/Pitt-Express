<?php
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

$sql = "INSERT INTO PITTEXPRESS.Staff (name, username, password, region, store, address, email, salary) VALUES ('".$name."','".$username."','".$pwd."','".$region."','".$store."','".$address."','".$email."','".$salary."');";
$conn->query($sql);

mysqli_close($conn);
?>