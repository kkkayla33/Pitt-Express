<?php

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";


$con = new mysqli($servername, $mysql_username, $mysql_password);

$sql="SELECT * FROM PITTEXPRESS.top_product;";
$result = mysqli_query($con,$sql);

echo "<table border='5'>
        <tr>
            <td>ranking</td>
            <td>item id</td>
            <td>item name</td>
            <td>sales</td>
            </tr>";

$i = 1;
while($row = mysqli_fetch_array($result))
{
    echo "<tr><td>".$i."</td><td>".$row["product_id"]."</td><td>".$row["name"]."</td><td>".$row["sales"]."</td></tr>";
    $i++;
}
echo "</table>";
mysqli_close($con);
?>