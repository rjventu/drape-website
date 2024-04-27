<?php

include("../classes/Database.class.php");
include("../classes/Cart.class.php");
include("../classes/CartCon.class.php");

$custId = $_SESSION["custId"];

$cart = new CartController(null, $custId);
checkAvailable($cart);

$sql = "SELECT ci.*, p.prod_name, p.prod_price, ps.stock_size FROM cart_item ci
        INNER JOIN product p ON ci.prod_id = p.prod_id
        INNER JOIN product_stock ps ON ci.stock_id = ps.stock_id 
        WHERE ci.cust_id = $custId;";
$result = mysqli_query($conn, $sql);

$totalPrice = 0;
$shippingCost = 60;

