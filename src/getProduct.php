<?php
$store_id = $_GET["sid"];
$con = mysqli_connect('127.0.0.1:3306','zhujingjie','zhujingjie');


echo "<table class=\"inventory\" border=\"5\">
    <tr>
        <td>product id</td>
        <td>product name</td>
        <td>category</td>
        <td>cost</td>
        <td></td>
    </tr>";

$sql = "SELECT Product.`product_id`, Product.name, classification.class_name, Product.cost  FROM PITTEXPRESS.Product LEFT JOIN PITTEXPRESS.classification On Product.`class_id` = classification.class_id ;";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . $row["product_id"] . "</td><td id='product_name'>" . $row["name"] . "</td><td>" . $row["class_name"] . "</td><td>" . $row["cost"] . "</td><td><button onclick='deleteProduct(" . $row["product_id"] .")'>Delete</button></td></tr>";
}

    echo "<tr>
            <td></td><td><select name=\"product\" id=\"product\">";
    $sql = "SELECT Product.product_id, Product.name FROM PittExpress.Product WHERE Product.product_id NOT IN (SELECT Inventory.product_id FROM PITTEXPRESS.Inventory WHERE Inventory.store_id =".$store_id."); ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value=".$row["product_id"].">".$row["name"]."</option>";
        }
    }
    echo "</select></td><td><input type=\"number\" id=\"inventory\" placeholder=\"number\" min = 0></td>

        <td><input type=\"number\" id=\"price\" placeholder=\"price\" min = 0></td>
        <td><button onclick=\"addInv('".$store_id."')\">Add</button></td>
       </tr>
        </table>";
mysqli_close($con);
?>