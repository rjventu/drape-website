<?php

class Product extends Database{
  protected function readProductTable(){
    $query = 'SELECT * FROM product';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute()){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readProductTableCat($cat_name){
    $query = 'SELECT * FROM product WHERE cat_name = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cat_name))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readProductTableFeatured(){
    $query = 'SELECT * FROM product LIMIT 4';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute()){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function searchProductTable($phrase){

    $phrase = "%".trim($phrase," ")."%";    

    $query = "SELECT * FROM product 
      WHERE CONCAT_WS(prod_id, prod_price, UPPER(prod_name), UPPER(cat_name)) LIKE UPPER(?)";
      
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($phrase))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }
  
  protected function readProductRecord($prod_id){

    $query = 'SELECT * FROM product WHERE prod_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readProductImg($prod_id){

    $query = 'SELECT * FROM product_gallery WHERE prod_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $result = $stmt;
    $img_array = [];

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      array_push($img_array, $row['img_name']);
    }

    return $img_array;
  }

  protected function readProductImgThumb($prod_id){

    $query = 'SELECT * FROM product_gallery WHERE prod_id = ? LIMIT 1;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $result = $stmt;
    $img_thumb = "";

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      $img_thumb = $row['img_name'];
    }

    return $img_thumb;
  }

  protected function readProductStock($prod_id){

    $query = 'SELECT * FROM product_stock WHERE prod_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $result = $stmt;
    $stock_array = [];

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      array_push($stock_array, $row['stock_qty']);
    }

    return $stock_array;
  }

  protected function createProduct($prod_name, $prod_price, $prod_description, $cat_name){

    $query = 'INSERT INTO product (prod_name, prod_price, prod_description, cat_name) VALUES (?, ?, ?, ?);';

    $dbh = $this->connect();
    $stmt = $dbh->prepare($query);

    $dbh->beginTransaction();
    if(!$stmt->execute(array($prod_name, $prod_price, $prod_description, $cat_name))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;

    $prod_id = $dbh->lastInsertId();
    $dbh->commit();

    return $prod_id;
  }

  protected function createImg($prod_id, $img_name){

    $query = 'INSERT INTO product_gallery (prod_id, img_name) VALUES (?, ?);';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id, $img_name))){
      $stmt = null;
      return "Error: Statement failed!";
    }

    $stmt = null;
    return "";
  }

  protected function createStock($prod_id, $stock_size, $stock_qty){

    $query = 'INSERT INTO product_stock (prod_id, stock_size, stock_qty) VALUES (?, ?, ?);';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id, $stock_size, $stock_qty))){
      $stmt = null;
      return "Error: Statement failed!";
    }

    $stmt = null;
    return "";
  }

  protected function updateProduct($prod_name, $prod_price, $prod_description, $cat_name, $prod_id){

    $query = 'UPDATE product SET prod_name = ?, prod_price = ?, prod_description = ?, cat_name = ? WHERE prod_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_name, $prod_price, $prod_description, $cat_name, $prod_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function updateStock($stock_qty, $prod_id, $stock_size){

    $query = 'UPDATE product_stock SET stock_qty = ? WHERE prod_id = ? AND stock_size = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($stock_qty, $prod_id, $stock_size))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function deleteProductRecord($prod_id){

    $query = 'DELETE FROM product WHERE prod_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function deleteImg($img_name){

    $query = 'DELETE FROM product_gallery WHERE img_name = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($img_name))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function deleteImgRecord($prod_id){

    $query = 'DELETE FROM product_gallery WHERE prod_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function deleteStockRecord($prod_id){

    $query = 'DELETE FROM product_stock WHERE prod_id = ?';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

}