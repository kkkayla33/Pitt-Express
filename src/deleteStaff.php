<?php
$staff_id = $_GET["sid"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "DELETE FROM PITTEXPRESS.Staff WHERE id='".$staff_id."';";
$conn->query($sql);
?>