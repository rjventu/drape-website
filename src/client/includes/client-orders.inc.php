<?php
include("../classes/Database.class.php");
include("../classes/Order.class.php");
include("../classes/OrderCon.class.php");

$cust_id = $_SESSION["custId"];
$order = new OrderController(null, null, null, null, null, $cust_id);

// check if orders table is empty
$result = $order->getTableCust();
list($empty_style, $full_style) = checkIfEmpty($result);