<?php
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $state_id = $_POST["state"];
    $zipcode = $_POST["zipcode"];
    $kind = $_POST["kind"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "INSERT INTO PITTEXPRESS.Customers (username, password, kind, street, city, state_id, zip_code) VALUES ('".$username."','".$pwd."','".$kind."','".$street."','".$city."','".$state_id."','".$zipcode."');";

$conn->query($sql);
$result = $conn->query($sql);
if($result == 1){
    $sql = "SELECT customer_id FROM PITTEXPRESS.Customers WHERE username='".$username."';";
    $result = $conn->query($sql);
    $customer_id = -1;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $customer_id = $row["customer_id"];
    }

    if($kind == 'Home'){
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $marriage = $_POST["marriage"];
        $home_income = $_POST["home_income"];

        $sql = "INSERT INTO PITTEXPRESS.Home_info (customer_id, income, gender, marriage, age) VALUES ('".$customer_id."','".$home_income."','".$gender."','".$marriage."','".$age."');";
        $result = $conn->query($sql);
    }else{
        $company_income = $_POST["company_income"];
        $sql = "INSERT INTO PITTEXPRESS.Business_info (customer_id, income) VALUES ('".$customer_id."','".$company_income."');";
        $result = $conn->query($sql);
    }

    mysqli_close($conn);
    echo "<script>alert(\"Register Success!\"); window.location.href=\"index.html\";</script>";
}else{
    mysqli_close($conn);
    echo "<script>alert(\"Register Failed!\"); window.location.href=\"register.html\";</script>";
}
?>
