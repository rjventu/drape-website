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
      $stock_id = $row["stock_id"];
      $item_qty = $row["item_qty"];
  }

  // get stock_qty
  $product = new ProductController();
  $result = $product->getRecordStockFromID($stock_id);
  while($row = $result->fetch(PDO::FETCH_ASSOC)){
      $stock_qty = $row["stock_qty"];
  }

  if($item_qty < $stock_qty){
    return true;
  }else{
    return false;
  }

}