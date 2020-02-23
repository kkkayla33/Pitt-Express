<?php

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";


$con = new mysqli($servername, $mysql_username, $mysql_password);

$sql="SELECT * FROM PITTEXPRESS.best_seller_business;";
$result = mysqli_query($con,$sql);

echo "<table border='5'>
        <tr>
            <td>ranking</td>
            <td>sales</td>
            <td>item id</td>
            <td>item name</td>
            <td>username</td>
            </tr>";

$i = 1;
while($row = mysqli_fetch_array($result))
{
    echo "<tr><td>".$i."</td><td>".$row["num"]."</td><td>".$row["product_id"]."</td><td>".$row["name"]."</td><td>".$row["username"]."</td></tr>";
    $i++;
}
echo "</table>";
mysqli_close($con);
?>