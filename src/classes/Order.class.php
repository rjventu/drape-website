<?php

class Order extends Database{
  protected function readOrderTable(){
    $query = 'SELECT od.*, c.cust_user FROM order_details od
              INNER JOIN customer c ON od.cust_id = c.cust_id;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute()){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readOrderTableCust($cust_id){
    $query = 'SELECT * FROM order_details WHERE cust_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cust_id))){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readOrderRecord($order_id){
    $query = 'SELECT od.*, oi.*, c.cust_user FROM order_details od
              INNER JOIN order_item oi ON od.order_id = oi.order_id
              INNER JOIN customer c ON od.cust_id = c.cust_id
              WHERE od.order_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($order_id))){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function createOrder($order_status, $order_fname, $order_lname, $order_phone, $order_address, $order_region, $order_zip, $order_remarks){

    $query = 'INSERT INTO order_details (cust_id, order_status, order_fname, order_lname, order_phone, order_address, order_region, order_zip, order_remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);';
    
    $dbh = $this->connect();
    $stmt = $dbh->prepare($query);

    $dbh->beginTransaction();
    if(!$stmt->execute(array($order_status, $order_fname, $order_lname, $order_phone, $order_address, $order_region, $order_zip, $order_remarks))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;

    $order_id = $dbh->lastInsertId();
    $dbh->commit();

    return $order_id;
  }

  protected function createOrderItem($item_name, $item_price, $item_size, $item_qty, $order_id){

    $query = 'INSERT INTO order_item (item_name, item_price, item_size, item_qty, order_id) VALUES (?, ?, ?, ?, ?);';

    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($item_name, $item_price, $item_size, $item_qty, $order_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function updateStatus($order_status, $order_id){
    $query = 'UPDATE order_details SET order_status = ? WHERE order_id = ?';

    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($order_status, $order_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function decrementStock($value, $stock_id){

    $query = 'UPDATE product_stock SET stock_qty = stock_qty - ? WHERE stock_id = ?';

    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($value, $stock_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

}