<?php
$username = $_POST["username"];
$pid = $_POST["pid"];
$items = explode(",",$pid);
$pcount = $_POST["pcount"];
$item_nums = explode(",",$pcount);
$pprice = $_POST["pprice"];
$item_pricess = explode(",",$pprice);
$store = $_POST["store"];
$sales = $_POST["sales"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "SELECT customer_id FROM PITTEXPRESS.Customers WHERE username='".$username."';";

$result = $conn->query($sql);
$customer_id = -1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $customer_id = $row["customer_id"];
}

$sql = "INSERT INTO PITTEXPRESS.Transaction (date, sales_id, customer_id, store_id) VALUES ('".date("Y-m-d")."','".$sales."','".$customer_id."','".$store."');";
$conn->query($sql);
$sql = "SELECT order_id FROM PITTEXPRESS.Transaction WHERE customer_id='".$customer_id."' ORDER BY date DESC LIMIT 1;";
$result = $conn->query($sql);
$order_id = -1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $order_id = $row["order_id"];
}

for($i = 0; $i < count($items); $i++){
    $item = $items[$i];
    $item_num = $item_nums[$i];
    $item_price = $item_pricess[$i];

    $sql = "INSERT INTO PITTEXPRESS.Detail (order_id, num, sale_price, product_id) VALUES ('".$order_id."','".$item_num."','".$item_price."','".$item."');";
    $conn->query($sql);
    $result = $conn->query($sql);
}

echo "Success";
?>