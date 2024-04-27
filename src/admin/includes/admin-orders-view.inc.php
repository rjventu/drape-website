<?php
include("../classes/Database.class.php");
include("../classes/Order.class.php");
include("../classes/OrderCon.class.php");

$order = new OrderController();
$order_id = $_GET["id"];
$result = $order->getRecord($order_id);

$shippingCost = 60.00;
