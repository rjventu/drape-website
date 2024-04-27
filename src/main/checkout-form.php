<?php

session_start();
if(!isset($_SESSION["custId"])){
    header("location: login.php");
}

include("../classes/Database.class.php");
include("../classes/Cart.class.php");
include("../classes/CartCon.class.php");
include("../classes/Order.class.php");
include("../classes/OrderCon.class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("includes/mysqli.config.php");

    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $address = $_POST["address"];
    $region = $_POST["region"];
    $zipCode = $_POST["zip-code"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $other = $_POST["other"];
    $total = $_POST["total"];
    $cust_id = $_SESSION["custId"];
    $order_status = "Pending";

    // Insert into order details table
    $sql = "INSERT INTO order_details (cust_id, order_status, order_fname, order_lname, order_phone, order_email, order_address, order_region, order_zip, order_remarks, order_total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssssssd", $cust_id, $order_status, $firstName, $lastName, $phone, $email, $address, $region, $zipCode, $other, $total);

    $conn->begin_transaction();
    if (!$stmt->execute()){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    
    $order_id = $conn->insert_id;
    $conn->commit();
    
    // Insert into order items table
    $cart = new CartController(null, $cust_id, null, null);
    $result = $cart->getTable();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $item_name = $row["prod_name"];
        $item_price = $row["prod_price"];
        $item_size = $row["stock_size"];
        $item_qty = $row["item_qty"];
        $cart_id = $row["cart_id"];
        $stock_id = $row["stock_id"];
        
        $order = new OrderController($item_name, $item_price, $item_size, $item_qty, $order_id);
        $order->addOrderItem();

        $cart->removeCartItem($cart_id);
        $order->decStock($item_qty, $stock_id);
    }    

    header("Location: ../client/client-orders.php");
    $conn->close();
    exit;
}

