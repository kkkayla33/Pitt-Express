<?php

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";


$con = new mysqli($servername, $mysql_username, $mysql_password);

$sql="SELECT * FROM PITTEXPRESS.total_profit;";
$result = $con->query($sql);
$row = $result->fetch_assoc();
echo $row["total_profit"];

mysqli_close($con);
?>