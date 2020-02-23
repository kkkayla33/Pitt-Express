<?php
$store_id = isset($_GET["sid"]) ? intval($_GET["sid"]) : '';

$con = mysqli_connect('127.0.0.1:3306','zhujingjie','zhujingjie');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT id, name FROM PITTEXPRESS.Staff WHERE store = '".$store_id."'";

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
{
    echo "<a href=\"#\" onclick=\"selectSales('".$row["id"]."','".$row["name"]."')\">".$row["name"]."</a>";
}
mysqli_close($con);
?>