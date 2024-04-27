<?php
include("../classes/Database.class.php");
include("../classes/Order.class.php");
include("../classes/OrderCon.class.php");

$shippingCost = 60.00;
$success_msg = $error_msg = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
  $order = new OrderController();
  $order_id = $_GET["id"];
}elseif(isset($_POST["submit"])){
  $order_id = $_POST["order_id"];
  $order_status = $_POST["order_status"];

  $order = new OrderController(null, null, null, null, $order_id);
  $error_msg = $order->editStatus($order_status);

  if(empty($error_msg)){
    $success_msg = "Order status was edited successfully!";
  }
}

$result = $order->getRecord($order_id);