<?php
$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$output = $_GET["output"];
$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "SELECT region_id, region_name, Staff.name as manager_name FROM PittExpress.Region, PITTEXPRESS.Staff WHERE Region.manage_id = Staff.id;";
$result = $conn->query($sql);

if($output == 'table'){
    echo "<table class=\"region\" border=\"5\">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>manager</td>
            <td></td>
        </tr>";
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($output == 'table'){
            echo "<tr><td>" . $row["region_id"] . "</td><td>" . $row["region_name"] . "</td><td>" . $row["manager_name"] . "</td><td><button onclick='deleteRegion(" . $row["region_id"] . ")'>Delete</button></td></tr>";
        }else {
            echo "<option value=" . $row["region_id"] . ">" . $row["region_name"] . "</option>";
        }
    }
}

if($output == 'table'){
    $sql = "SELECT Staff.id as staff_id, Staff.name as staff_name FROM PITTEXPRESS.Staff WHERE Staff.id NOT IN (SELECT manage_id FROM PITTEXPRESS.Region UNION SELECT manager_id FROM PITTEXPRESS.Store);";
    $result = $conn->query($sql);

    echo "<tr>
            <td></td>
            <td><input type=\"text\" id=\"name\" placeholder=\"name\"></td>
            <td><select name=\"manager\" id=\"manager\">";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value=".$row["staff_id"].">".$row["staff_name"]."</option>";
        }
    }

    echo "</select></td>
            <td><button onclick=\"addRegion()\">Add</button></td>
        </tr>
        </table>";
}
mysqli_close($conn);
?>