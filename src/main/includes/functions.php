<?php

function getStockQty($prod_id, $stock_size, $product){
  $stock_qty = $product->getRecordStockQty($prod_id, $stock_size);

  if($stock_qty == 0){
    return false;
  }else{
    return true;
  }
}