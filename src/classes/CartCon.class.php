<?php

class CartController extends Cart{
  private $prod_id;
  private $cust_id;
  private $stock_id;
  private $item_qty;
  
  public function __construct($prod_id=null, $cust_id=null, $stock_id=null, $item_qty=null){
    $this->prod_id = $prod_id;
    $this->cust_id = $cust_id;
    $this->stock_id = $stock_id;
    $this->item_qty = $item_qty;
  }

  public function getTable(){
    $result = $this->readCartTable($this->cust_id);
    return $result;
  }
  
  public function getRecordFromStock(){
    $result = $this->readCartItemFromStock($this->prod_id, $this->stock_id);
    return $result;
  }

  public function getRecordFromID($cart_id){
    $result = $this->readCartItemFromID($cart_id);
    return $result;
  }

  public function checkIfRecordExists(){
    $result = $this->cartRecordExists($this->prod_id, $this->stock_id);
    return $result;
  }
  
  public function addCartItem(){
    return $this->createCartItem($this->prod_id, $this->cust_id, $this->stock_id, $this->item_qty);
  }

  public function incCartItem($cart_id){
    return $this->incrementCartItem($cart_id);
  }
  
  public function decCartItem($cart_id){
    return $this->decrementCartItem($cart_id);
  }

  public function removeCartItem($cart_id){
    return $this->deleteCartItem($cart_id);
  }
  
}