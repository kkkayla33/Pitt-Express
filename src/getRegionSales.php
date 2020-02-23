<?php

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";


$con = new mysqli($servername, $mysql_username, $mysql_password);

$sql="SELECT * FROM PITTEXPRESS.region_volume;";
$result = mysqli_query($con,$sql);

echo "<table border='5'>
        <tr>
            <td>ranking</td>
            <td>region id</td>
            <td>region name</td>
            <td>region manager</td>
            <td>region sales</td>
            </tr>";

$i = 1;
while($row = mysqli_fetch_array($result))
{
    echo "<tr><td>".$i."</td><td>".$row["region_id"]."</td><td>".$row["region_name"]."</td><td>".$row["region_manager"]."</td><td>".$row["region_performance"]."</td></tr>";
    $i++;
}
echo "</table>";
mysqli_close($con);
?>