<?php

class Cart extends Database{
  protected function readCartTable($cust_id){
    $query = 'SELECT * FROM cart_item WHERE cust_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cust_id))){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readCartItem($prod_id, $cust_id){
    $query = 'SELECT * FROM cart_item WHERE prod_id = ? AND cust_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id, $cust_id))){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readCartItemFromStock($prod_id, $stock_id){
    $query = 'SELECT * FROM cart_item WHERE prod_id = ? AND stock_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id, $stock_id))){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readCartItemFromID($cart_id){
    $query = 'SELECT * FROM cart_item WHERE cart_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cart_id))){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function cartExists($cust_id){
    $query = 'SELECT COUNT(1) FROM cart_item WHERE cust_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cust_id))){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function cartRecordExists($prod_id, $stock_id){
    $query = 'SELECT COUNT(1) FROM cart_item WHERE prod_id = ? AND stock_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id, $stock_id))){
      $stmt = null;
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function createCartItem($prod_id, $cust_id, $stock_id, $item_qty){

    $query = 'INSERT INTO cart_item (prod_id, cust_id, stock_id, item_qty) VALUES (?, ?, ?, ?);';

    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id, $cust_id, $stock_id, $item_qty))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function incrementCartItem($cart_id){

    $query = 'UPDATE cart_item SET item_qty = item_qty + 1 WHERE cart_id = ?';

    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cart_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function decrementCartItem($cart_id){

    $query = 'UPDATE cart_item SET item_qty = item_qty - 1 WHERE cart_id = ?';

    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cart_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function deleteCartItem($cart_id){

    $query = 'DELETE FROM cart_item WHERE cart_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cart_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

}