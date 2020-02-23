<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/BaseLayout.css">
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
</head>
<body>
<script>
    function selectregion(region_id, region_name){
        var region_btn = document.getElementById("region_btn");
        region_btn.innerHTML=region_name;
        var region_id_div = document.getElementById("region_id");
        region_id_div.innerHTML=region_id;
        showStores(region_id);
    }

    function showStores(region_id)
    {
        if (region_id=="")
        {
            document.getElementById("store_content").innerHTML="";
            return;
        }

        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("store_content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getStore.php?rid="+region_id,true);
        xmlhttp.send();
    }

    function selectStore(store_id, address){
        var store_btn = document.getElementById("store_btn");
        store_btn.innerHTML=address;
        var store_id_div = document.getElementById("store_id");
        store_id_div.innerHTML=store_id;
        showSales(store_id);
    }

    function showSales(store_id)
    {
        if (store_id=="")
        {
            document.getElementById("sales_content").innerHTML="";
            return;
        }

        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("sales_content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getSales.php?sid="+store_id,true);
        xmlhttp.send();
    }

    function selectSales(sale_id, sale_name){
        var sales_btn = document.getElementById("sales_btn");
        sales_btn.innerHTML=sale_name;
        var sales_id_div = document.getElementById("sales_id");
        sales_id_div.innerHTML=sale_id;
    }


    function modify(id, content){
        document.getElementById(id).innerHTML=content;
    }

    function ok(){

        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        var innerHTML = "<div name=\"cart\"><table border='5'><tr><td>item_id</td><td>item_name</td><td>item_price</td><td>item_number</td></tr>";
        for(var i = 0; i <ca.length; i++) {

            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if(c.startsWith("username")){
                var cookie = c.split("=");
                modify("username", cookie[1]);
                document.getElementById("username").innerText=cookie[1];
            }
            if (c.startsWith("pid_")) {
                var cookie = c.split("=");
                var item = cookie[0].split('_');
                var item_id = item[1];
                var item_name = item[2];
                var item_price = item[3];
                var count = Number(cookie[1]);
                innerHTML = innerHTML+"<tr><div name=\"item\"><td><div name=\"item_id\" class=\"item_id\">"+item_id+"</div></td><td><div name=\"item_name\">"+item_name+"</div></td><td><div name=\"item_price\" class=\"item_price\">"+item_price+"</div></td><td><div name=\"item_num\" class=\"count\">"+count+"</div></td></div></tr>"
            }
        }
        innerHTML = innerHTML+"</table></div>";
        modify("cart_list", innerHTML);
    }

    window.onload = ok;

    function checkout() {

        var region = document.getElementById("region_id").innerText;
        var store = document.getElementById("store_id").innerText;
        var sales = document.getElementById("sales_id").innerText;
        if(region == null || region== ''){
            alert("Please specify your region");
            return false;
        }
        if(store == null || store== ''){
            alert("Please specify your store");
            return false;
        }if(sales == null || sales== ''){
            alert("Please specify your deliveryman");
            return false;
        }
        var xmlhttp =new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                alert(xmlhttp.responseText);
                window.location.href = "view.php";
            }
        }
        xmlhttp.open("POST","/checkout.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        var username = document.getElementById("username").innerText;
        var sendMessage = "username="+username;
        var pid = "";
        var pcount = "";
        var pprice ="";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {

            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.startsWith("pid_")) {
                var cookie = c.split("=");
                var item = cookie[0].split('_');
                var item_id = item[1];
                var item_name = item[2];
                var item_price = item[3];
                var count = Number(cookie[1]);
                pid = pid+"," +item_id;
                pcount = pcount+","+count;
                pprice = pprice+","+item_price;
            }
        }
        sendMessage = sendMessage+ "&pid="+pid+"&pcount="+pcount+"&pprice="+pprice +"&region="+region+"&store="+store+"&sales="+sales;

        xmlhttp.send(sendMessage);
    }
</script>
<div class="header">
    <p>Pitt-Express Grocery Delivery</p>
</div>
<h3>Your Cart</h3>
<a href="view.php"><button>Continue Shopping</button></a>
<button onclick="ok()">Refresh Cart</button>
<div>
    Hello, <div name="username" id="username"></div>
    <div class="dropdown">
        <button class="dropbtn" id="region_btn">Region</button>
        <div id="region_id" hidden="hidden"></div>
        <div class="dropdown-content">
            <?php

                $servername = "127.0.0.1:3306";
                $mysql_username = "zhujingjie";
                $mysql_password = "zhujingjie";

                $conn = new mysqli($servername, $mysql_username, $mysql_password);


                $sql = "SELECT region_id, region_name FROM PITTEXPRESS.Region;";
                $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<a href=\"#\" onclick=\"selectregion('".$row["region_id"]."','".$row["region_name"]."')\">".$row["region_name"]."</a>";
            }
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" id="store_btn">Store</button>
        <div id="store_id" hidden="hidden"></div>
        <div class="dropdown-content" id="store_content">
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" id="sales_btn">Deliveryman</button>
        <div id="sales_id" hidden="hidden"></div>
        <div class="dropdown-content" id="sales_content">
        </div>
    </div>
    <div class="cart_list" id="cart_list"></div>
    <button onclick="checkout()">Checkout</button>
    <div id="response"></div>
</div>
</body>
</html>