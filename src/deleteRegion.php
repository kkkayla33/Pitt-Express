<?php
$region_id = $_GET["rid"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "DELETE FROM PITTEXPRESS.Region WHERE region_id='".$region_id."';";
$conn->query($sql);
?>