<?php

function getStockQty($prod_id, $stock_size, $product){
  $result = $product->getRecordStockRecord($prod_id, $stock_size);

  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $stock_qty = $row['stock_qty'];
  }

  if($stock_qty == 0){
    return false;
  }else{
    return true;
  }
}

function checkStock($cart, $product, $cart_id){

  // get stock_id and item_qty
  $cart = new CartController();
  $result = $cart->getRecordFromID($cart_id);
  while($row = $result->fetch(PDO::FETCH_ASSOC)){
      $item_qty = $row["item_qty"];
      $stock_qty = $row["stock_qty"];
  }

  if($item_qty < $stock_qty){
    return true;
  }else{
    return false;
  }

}

function checkIfEmpty($result){
  $empty_style = "";
  $full_style = "";

  $row = $result->fetch(PDO::FETCH_ASSOC);

  if(!$row)
    $full_style = "display: none";
  else
    $empty_style = "display: none";

  return array($empty_style, $full_style);
}

function checkAvailable($cart){
  
  $removed = false;
  $removed_items = [];
  $result = $cart->getTable();
  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    if($row["stock_qty"] <= 0){
      $removed_items[] = $row["prod_name"] . " (" . $row["stock_size"] .  ")";
      $removed = true;
      $cart->removeCartItem($row["cart_id"]);
    }
  }

  if($removed){
    ?>
    <script>
      alert("The following items are unavailable and have been removed from your cart:\n\n<?php
        foreach($removed_items as $item){
          echo $item."\\n";
        }
      ?>");
    </script>
    <?php
  }
}