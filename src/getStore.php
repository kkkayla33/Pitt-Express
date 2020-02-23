<?php
$region_id = $_GET["rid"];
$output = $_GET["output"];
$con = mysqli_connect('127.0.0.1:3306','zhujingjie','zhujingjie');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
/**
if($region_id == null || $region_id == ''){
    $username = $_GET["username"];
    $sql="SELECT region FROM PITTEXPRESS.Staff WHERE username = '".$username."';";
    $result = mysqli_query($con,$sql);
    $row = $result->fetch_assoc();
    $region_id = $row["region"];
}*/



if($output == 'table'){
    echo "<table class=\"store\" border=\"5\">
        <tr>
            <td>id</td>
            <td>region</td>
            <td>name</td>
            <td>manager</td>
            <td></td>
        </tr>";
}


$sql = '';
if($region_id == null || $region_id == ''){
    $sql="SELECT store_id, region_name, store.address, Staff.name as manager_name FROM PITTEXPRESS.store, PITTEXPRESS.region, PITTEXPRESS.Staff WHERE store.region_id = region.region_id AND store.manager_id = Staff.id ORDER BY store_id ASC;";
}else{
    $sql="SELECT * FROM PITTEXPRESS.store WHERE region_id = '".$region_id."';";
}

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
{
    if($output == 'option'){
        echo "<option value=".$row["store_id"].">".$row["address"]."</option>";
    }else if($output=='table') {
        echo "<tr><td>".$row["store_id"]. "</td><td>" . $row["region_name"] . "</td><td>" . $row["address"] . "</td><td>" . $row["manager_name"] . "</td><td><button onclick='deleteStore(".$row["store_id"].")'>Delete</button></td></tr>";
    }else{
        echo "<a href=\"#\" onclick=\"selectStore('".$row["store_id"]."','".$row["address"]."')\">".$row["address"]."</a>";
    }
}

if($output == 'table'){
    echo "<tr>
            <td></td><td><select name=\"region\" id=\"region\"\">";
    $sql = "SELECT region_id, region_name FROM PittExpress.Region";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value=".$row["region_id"].">".$row["region_name"]."</option>";
        }
    }
    echo "</select></td><td><input type=\"text\" id=\"name\" placeholder=\"name\"></td>
            <td><select name=\"manager\" id=\"manager\">";

    $sql = "SELECT Staff.id as staff_id, Staff.name as staff_name FROM PITTEXPRESS.Staff WHERE Staff.id NOT IN (SELECT manage_id FROM PITTEXPRESS.Region UNION SELECT manager_id FROM PITTEXPRESS.Store);";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value=".$row["staff_id"].">".$row["staff_name"]."</option>";
        }
    }

    echo "</select></td>
            <td><button onclick=\"addStore()\">Add</button></td>
        </tr>
        </table>";
}
mysqli_close($con);
?>