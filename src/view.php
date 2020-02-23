<!DOCTYPE html>
<html>
<head>
    <title>Pitt-Express Grocery Delivery</title>
    <link rel="stylesheet" type="text/css" href="styles/BaseLayout.css">
    <link rel="stylesheet" type="text/css" href="styles/view.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    function selectCategory(class_id, class_name){
        var category_btn = document.getElementById("category_btn");
        category_btn.innerHTML=class_name;

        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("main-column").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getCategory.php?cid="+class_id,true);
        xmlhttp.send();
    }

    function addCart(product_id, product_name, product_price){
        var name = "pid_" + product_id + "_"+product_name+"_"+product_price+"=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        var num = 1;
        for(var i = 0; i <ca.length; i++) {

            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                num = Number(c.substring(name.length, c.length));
                num = num + 1;
            }
        }
        document.cookie = name+num;
    }

    function search() {
        var searchInput = document.getElementById("search").value;

        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("main-column").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getSearch.php?s="+searchInput,true);
        xmlhttp.send();
    }

    function exitLogin() {
        document.cookie="username=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
        document.cookie="userkind=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
        document.cookie="loginstatus=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
        window.location.href="index.html";

    }
</script>
<div class="header">
    <a href="index.html"><img class="logo" src="images/p.png" width="100px" ></a>
    <p>Pitt-Express Grocery Delivery</p>
</div>
<div class="side-column">
    <a href="viewcart.php"><button >Cart</button></a>
    <br>
    <input type="text" id="search" placeholder="Search...">
    <input type="button" value="Search" onclick="search()">
    <input type="button" value="Exit" onclick="exitLogin()">
    <br>
    <div class="dropdown">
        <button class="dropbtn" id="category_btn">Category</button>
        <div class="dropdown-content">
            <?php

            $servername = "127.0.0.1:3306";
            $username = "zhujingjie";
            $password = "zhujingjie";

            $conn = new mysqli($servername, $username, $password);


            $sql = "SELECT class_id, class_name FROM PITTEXPRESS.Classification;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<a href=\"#\" onclick=\"selectCategory('".$row["class_id"]."','".$row["class_name"]."')\">".$row["class_name"]."</a>";
                }
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>
<div class="main-column" id="main-column">
    <?php
    $conn = new mysqli($servername, $username, $password);

    $sql = "SELECT * FROM PITTEXPRESS.Product;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class=\"item\">
                <div class=\"item_img\">
                    <img src=\"images/".$row["image"]."\"/>
                </div>
                <br/>
                <div class=\"item_desc\">
                    <form action=''>
                        <div class=\"item_id\" style='display: none'>".$row["product_id"]."</div>
                        <div class=\"item_name\">".$row["name"]."</div>
                        <div class=\"item_price\">$".$row["price"]."</div>
                        
                    <button type='submit' onclick=\"addCart('".$row["product_id"]."','".$row["name"]."','".$row["price"]."')\">Add to Cart</button></form>
                </div>
            </div>";
        }
    }
    mysqli_close($conn);
    ?>
</div>
</body>
</html>