<h3>Staff Management</h3>

<div>
    <table class="orders" border="5">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Username</td>
            <td>Password</td>
            <td>Region</td>
            <td>Store</td>
            <td>Address</td>
            <td>Email</td>
            <td>Salary</td>
            <td></td>
        </tr>
<?php
$username = $_GET["username"];
$userkind = $_GET["userkind"];

$servername = "127.0.0.1:3306";
$mysql_username = "zhujingjie";
$mysql_password = "zhujingjie";

$conn = new mysqli($servername, $mysql_username, $mysql_password);

$sql = "SELECT staffs.id as staff_id, staffs.name as staff_name, staffs.username, staffs.password, staffs.address, Region.region_name, store.address as store_name, email, salary FROM PITTEXPRESS.Staff staffs
LEFT JOIN PITTEXPRESS.Region ON Region.region_id = staffs.region
LEFT JOIN PITTEXPRESS.store ON store.store_id = staffs.store ORDER BY staff_id ASC;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr id='staff_".$row["staff_id"]."'>";
        echo "<td class='staff_id'>".$row["staff_id"]."</td>";
        echo "<td class='staff_name'>".$row["staff_name"]."</td>";
        echo "<td class='staff_username'>".$row["username"]."</td>";
        echo "<td class='staff_pwd'>".$row["password"]."</td>";
        echo "<td class='staff_region'>".$row["region_name"]."</td>";
        echo "<td class='staff_store'>".$row["store_name"]."</td>";
        echo "<td class='staff_addr'>".$row["address"]."</td>";
        echo "<td class='staff_email'>".$row["email"]."</td>";
        echo "<td class='staff_salary'>".$row["salary"]."</td>";
        echo "<td class='btn'><button onclick='editStaff(".$row["staff_id"].")'>Edit</button></td>";
        echo "</tr>";
    }
}
mysqli_close($conn);
?>

        <tr>
            <td></td>
            <td><input type="text" id="name" placeholder="Staff name" style="width:70px"></td>
            <td><input type="text" id="account" placeholder="Username" style="width:80px"></td>
            <td><input type="text" id="pwd" placeholder="Password" style="width:70px"></td>
            <td><select name="region" id="region" onclick="getStore()" onchange="getStore()">
                    <?php
                    $conn = new mysqli($servername, $mysql_username, $mysql_password);

                    $sql = "SELECT region_id, region_name FROM PittExpress.Region";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row["region_id"].">".$row["region_name"]."</option>";
                        }
                    }
                    mysqli_close($conn);
                    ?>
                </select></td>
            <td><select name="store" id="store" style="width:50px">
                </select></td>
            <td><textarea id="address" placeholder="Address" style="width:70px"></textarea></td>
            <td><input type="text" id="email" placeholder="Email"></td>
            <td><input type="number" id="salary" placeholder="Salary" min="0" style="width:45px"></td>
            <td><button onclick="addStaff()">Add</button></td>
        </tr>
    </table>
</div>

