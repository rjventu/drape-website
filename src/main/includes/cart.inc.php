<?php

include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");
include("../classes/Cart.class.php");
include("../classes/CartCon.class.php");

$cart = new CartController(null, $_SESSION["custId"], null, null);

$empty_style = "";
$full_style = "";

$result_c = $cart->checkIfExists();

while($row_c = $result_c->fetch(PDO::FETCH_NUM)){
  $count = intval($row_c[0]); 
}

if($count == 0)
    $full_style = "display: none";
else
    $empty_style = "display: none";


if(isset($_POST["add-to-cart"])){

    if(!isset($_POST["size"])){
        echo "
            <script>
                alert('Please choose among the available sizes.');
                history.back();
            </script>
        ";
        exit();
    }else{
        // get values from form
        $prod_id = $_POST["prod_id"];
        $cust_id = $_SESSION["custId"];
        $stock_size = $_POST["size"];
        $item_qty = 1;

        // get stock_id
        $product = new ProductController();
        $result = $product->getRecordStockRecord($prod_id, $stock_size);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $stock_id = $row['stock_id'];
        }

        $cart = new CartController($prod_id, $cust_id, $stock_id, $item_qty); 

        // get no. of instances that same product and variation is in cart
        $result = $cart->checkIfRecordExists();
        while($row = $result->fetch(PDO::FETCH_NUM)){
            $count = intval($row[0]); 
        }

        // executes when product and variation is already in cart
        if($count != 0){

            // get cart_id
            $result = $cart->getRecordFromStock();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $cart_id = $row["cart_id"];
            }

            $available = checkStock($cart, $product, $cart_id);
            
            // check if there is remaining stock
            if($available){
                $cart->incCartItem($cart_id);
                header("location: cart.php");
            }else{
                echo "
                <script>
                    alert('Sorry, you have reached the maximum amount of items for this product.');
                    window.location.href = 'prod-desc.php?prod_id=".$prod_id."';
                </script>";
            }
        }else{ 
            //executes on new product
            $cart->addCartItem();
            header("location: cart.php");
        }
    }
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    $cust_id = $_SESSION["custId"];

    if(isset($_GET["inc_id"])){
        $cart_id = $_GET["inc_id"];

        $cart = new CartController();
        $product = new ProductController();
        $available = checkStock($cart, $product, $cart_id);
        
        // check if there is remaining stock
        if($available){
            $cart->incCartItem($cart_id);
            header("location: cart.php");
        }else{
            echo "
            <script>
                alert('Sorry, you have reached the maximum amount of items for this product.');
                window.location.href = 'cart.php';
            </script>";
        }
    }

    if(isset($_GET["dec_id"])){
        $cart_id = $_GET["dec_id"];
      
        // get stock_id and item_qty
        $cart = new CartController();
        $result = $cart->getRecordFromID($cart_id);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
          $stock_id = $row["stock_id"];
          $item_qty = $row["item_qty"];
        }

        // check if this is the last item in the cart
        if($item_qty == 1){
            $cart->removeCartItem($cart_id);
            header("location: cart.php");
        }else{
            $cart->decCartItem($cart_id);
            header("location: cart.php");
        }
    }
}

// loads cart
$result = $cart->getTable();