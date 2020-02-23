<?php
$class_id = isset($_GET["cid"]) ? intval($_GET["cid"]) : '';

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "SELECT * FROM PITTEXPRESS.Product WHERE class_id='".$class_id."';";
$result = $conn->query($sql);

$i = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class=\"item\">
                    <div class=\"item_img\">
                        <img src=\"images/".$row["image"]."\"/>
                    </div>
                    <br/>
                    <div class=\"item_desc\">
                        <div class=\"item_id\" style='display: none'>".$row["product_id"]."</div>
                        <div class=\"item_name\">".$row["name"]."</div>
                        <div class=\"item_price\">$".$row["price"]."</div>
                        <button type='submit' onclick=\"addCart('".$row["product_id"]."','".$row["name"]."','".$row["price"]."')\">Add to Cart</button>
                    </div>
                </div>";
    }
}
mysqli_close($conn);
?>