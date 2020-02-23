<?php
$username = $_POST["username"];
$password = $_POST["pwd"];
$userkind = $_POST["userkind"];

if($username == "admin" && $userkind == "Staff"){
    if($password == "admin"){
        setcookie("userkind", $userkind);
        setcookie("username", $username);
        setcookie("loginstatus",'0');
        setcookie("position",'CEO');
        setcookie('myid', '0');
        echo "<script language=\"javascript\" type=\"text/javascript\">window.location.href='admin.html';</script>";
    }
}else{
    $servername = "127.0.0.1:3306";
    $mysql_username = "zhujingjie";
    $mysql_password = "zhujingjie";

    $conn = new mysqli($servername, $mysql_username, $mysql_password);

    $sql = "";
    if($userkind == 'Customer')
        $sql = "SELECT * FROM PITTEXPRESS.Customers WHERE username='".$username."';";
    else{
        $sql = "SELECT * FROM PITTEXPRESS.Staff WHERE username='".$username."';";
    }
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($password == $row["password"]){
        setcookie("userkind", $userkind);
        setcookie("username", $username);
        setcookie("loginstatus",'0');
        setcookie("name",$row["name"]);
        if($userkind == 'Customer'){
            echo "<script language=\"javascript\" type=\"text/javascript\">window.location.href='view.php';</script>";
        }else{
            setcookie('myid', $row["id"]);
            $sql = "SELECT * FROM PITTEXPRESS.Region WHERE manage_id='".$row["id"]."';";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                setcookie("position",'regionManager');
                setcookie('myregionid', $row["region_id"]);
                setcookie('myregionname', $row["region_name"]);
            }else{
                $sql = "SELECT store.store_id, store.address as store_name FROM PITTEXPRESS.store WHERE store.manager_id='".$row["id"]."';";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    setcookie("position",'storeManager');
                    setcookie('mystoreid', $row["store_id"]);
                    setcookie('mystorename', $row["store_name"]);
                }else{
                    setcookie("position",'deliveryman');
                }
            }
            echo "<script language=\"javascript\" type=\"text/javascript\">window.location.href='admin.html';</script>";
        }
    }else{
        setcookie("loginstatus",'-1');
        echo "<script language=\"javascript\" type=\"text/javascript\">window.location.href='index.html';</script>";
    }
    mysqli_close($conn);
}
?>