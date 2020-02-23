<?php

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";


$con = new mysqli($servername, $mysql_username, $mysql_password);

$sql="SELECT * FROM PITTEXPRESS.store_volume;";
$result = mysqli_query($con,$sql);

echo "<table border='5'>
        <tr>
            <td>ranking</td>
            <td>store id</td>
            <td>region name</td>
            <td>store</td>
            <td>store manager</td>
            <td>store sales</td>
            </tr>";

$i = 1;
while($row = mysqli_fetch_array($result))
{
    echo "<tr><td>".$i."</td><td>".$row["store_id"]."</td><td>".$row["region_name"]."</td><td>".$row["address"]."</td><td>".$row["store_manager"]."</td><td>".$row["store_performance"]."</td></tr>";
    $i++;
}
echo "</table>";
mysqli_close($con);
?>