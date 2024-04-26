<?php

class OrderController extends Order{
  private $item_name;
  private $item_price;
  private $item_size;
  private $item_qty;
  private $order_id;
  private $cust_id;

  public function __construct($item_name=null, $item_price=null, $item_size=null, $item_qty=null, $order_id=null, $cust_id=null){
    $this->item_name = $item_name;
    $this->item_price = $item_price;
    $this->item_size = $item_size;
    $this->item_qty = $item_qty;
    $this->order_id = $order_id;
    $this->cust_id = $cust_id;
  }

  public function getTable(){
    return $this->readOrderTable();
  }
  public function getTableCust(){
    return $this->readOrderTableCust($this->cust_id);
  }

  public function getRecord($order_id){
    return $this->readOrderRecord($order_id);
  }

  public function addOrderItem(){
    return $this->createOrderItem($this->item_name, $this->item_price, $this->item_size, $this->item_qty, $this->order_id);
  }

  public function editStatus($order_status){
    return $this->updateStatus($order_status, $this->order_id);
  }

  public function decStock($value, $stock_id){
    return $this->decrementStock($value, $stock_id);
  }
  
}