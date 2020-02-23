<h3>Order History</h3>

<div>
    <table class="orders" border="5">
        <tr>
            <td>Date</td>
            <td>Item name</td>
            <td>Item number</td>
            <td>Item price</td>
            <td>Region</td>
            <td>Store</td>
            <td>Sales</td>
            <td>Customer</td>
        </tr>
<?php
$ref_id = $_GET["refid"];
$position = $_GET["position"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql;
if($position == 'CEO'){
    $sql = "SELECT trans.date, trans.order_id, region_name, store.address, sales.name as sales_name, customers.username as customer_name FROM PITTEXPRESS.Transaction trans
LEFT JOIN PITTEXPRESS.store store on trans.store_id = store.store_id
LEFT JOIN PITTEXPRESS.Region region on store.region_id = region.region_id
LEFT JOIN PITTEXPRESS.Customers customers on trans.customer_id = customers.customer_id
LEFT JOIN PITTEXPRESS.Staff sales on trans.sales_id = sales.id  Order By date Desc;";
}else if($position == "regionManager"){
    $sql = "SELECT trans.date, trans.order_id, region_name, store.address, sales.name as sales_name, customers.username as customer_name FROM PITTEXPRESS.Transaction trans
LEFT JOIN PITTEXPRESS.store store on trans.store_id = store.store_id
LEFT JOIN PITTEXPRESS.Region region on store.region_id = region.region_id
LEFT JOIN PITTEXPRESS.Customers customers on trans.customer_id = customers.customer_id
LEFT JOIN PITTEXPRESS.Staff sales on trans.sales_id = sales.id  WHERE region.region_id = '".$ref_id."' Order By date Desc;";
}else if($position == "storeManager"){
    $sql = "SELECT trans.date, trans.order_id, region_name, store.address, sales.name as sales_name, customers.username as customer_name FROM PITTEXPRESS.Transaction trans
LEFT JOIN PITTEXPRESS.store store on trans.store_id = store.store_id
LEFT JOIN PITTEXPRESS.Region region on store.region_id = region.region_id
LEFT JOIN PITTEXPRESS.Customers customers on trans.customer_id = customers.customer_id
LEFT JOIN PITTEXPRESS.Staff sales on trans.sales_id = sales.id WHERE store.store_id = '".$ref_id."' Order By date Desc;";
}else if($position == "deliveryman"){
    $sql = "
SELECT trans.date, trans.order_id, region_name, store.address, sales.name as sales_name, customers.username as customer_name FROM PITTEXPRESS.Transaction trans
LEFT JOIN PITTEXPRESS.store store on trans.store_id = store.store_id
LEFT JOIN PITTEXPRESS.Region region on store.region_id = region.region_id
LEFT JOIN PITTEXPRESS.Customers customers on trans.customer_id = customers.customer_id
LEFT JOIN PITTEXPRESS.Staff sales on trans.sales_id = sales.id WHERE trans.sales_id = '".$ref_id."' Order By date Desc;";
}else{
    $sql = "SELECT trans.date, trans.order_id, region_name, store.address, sales.name as sales_name, customers.username as customer_name FROM PITTEXPRESS.Transaction trans
LEFT JOIN PITTEXPRESS.store store on trans.store_id = store.store_id
LEFT JOIN PITTEXPRESS.Region region on store.region_id = region.region_id
LEFT JOIN PITTEXPRESS.Customers customers on trans.customer_id = customers.customer_id
LEFT JOIN PITTEXPRESS.Staff sales on trans.sales_id = sales.id  WHERE trans.customer_id = '".$ref_id."' Order By date Desc;";
}

echo $position;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["date"]."</td>";
        $new_sql = "SELECT products.name as item_name, details.sale_price as item_price, details.num as item_num  FROM PITTEXPRESS.Detail details, PITTEXPRESS.Product products WHERE details.order_id = ".$row["order_id"]." AND details.product_id = products.product_id;";
        $items_result = $conn->query($new_sql);
        if ($items_result->num_rows > 0) {
            $item_name = "";
            $item_num = "";
            $item_price = "";

            while($items = $items_result->fetch_assoc()) {
                $item_name = $item_name."<br>".$items["item_name"];
                $item_num = $item_num."<br>".$items["item_num"];
                $item_price = $item_price."<br>$".$items["item_price"];
            }

            echo "<td>".substr($item_name, 4)."</td>";
            echo "<td>".substr($item_num,4)."</td>";
            echo "<td>".substr($item_price,4)."</td>";
        }
            echo "<td>".$row["region_name"]."</td>";
            echo "<td>".$row["address"]."</td>";
            echo "<td>".$row["sales_name"]."</td>";
            echo "<td>".$row["customer_name"]."</td>";
        echo "</tr>";
    }
}
mysqli_close($conn);
?>
    </table>
</div>