<?php

class ProductController extends Product{
  private $prod_id;
  private $prod_name;
  private $prod_price;
  private $prod_description;
  private $cat_name;
  
  public function __construct($prod_id=null, $prod_name=null, $prod_price=null, $prod_description=null, $cat_name=null){
    $this->prod_id = $prod_id;
    $this->prod_name = $prod_name;
    $this->prod_price = $prod_price;
    $this->prod_description = $prod_description;
    $this->cat_name = $cat_name;
  }

  public function getTable(){
    $result = $this->readProductTable();
    return $result;
  }

  public function getTableCat($cat_name){
    $result = $this->readProductTableCat($cat_name);
    return $result;
  }

  public function getTableFeatured(){
    $result = $this->readProductTableFeatured();
    return $result;
  }

  public function getSearchTable($phrase){
    $result = $this->searchProductTable($phrase);
    return $result;
  }

  public function getRecord($prod_id){
    $result = $this->readProductRecord($prod_id);
    return $result;
  }

  public function getRecordImg($prod_id){
    $result = $this->readProductImg($prod_id);
    return $result;
  }

  public function getRecordImgThumb($prod_id){
    $result = $this->readProductImgThumb($prod_id);
    return $result;
  }
  
  public function getRecordStock($prod_id){
    $result = $this->readProductStock($prod_id);
    return $result;
  }

  public function getRecordStockQty($prod_id, $stock_size){
    $result = $this->readProductStockQty($prod_id, $stock_size);
    return $result;
  }

  public function addProduct(){
    if($this->invalidName()){
      return "Error: Invalid name! Valid characters include: a-z A-Z 0-9 \" () - ";
    }else{
      return $this->createProduct($this->prod_name, $this->prod_price, $this->prod_description, $this->cat_name);
    }
  }

  public function addImage($prod_id, $img_name){
    $result = $this->createImg($prod_id, $img_name);
    return $result;
  
  }
  public function addStock($prod_id, $stock_name, $stock_qty){
    $result = $this->createStock($prod_id, $stock_name, $stock_qty);
    return $result;
  }

  public function editProduct(){
    if($this->invalidName()){
      return "Error: Invalid name! Valid characters include: a-z A-Z 0-9 \" () - ";
    }
    return $this->updateProduct($this->prod_name, $this->prod_price, $this->prod_description, $this->cat_name, $this->prod_id);
  }

  public function editStock($stock_qty, $prod_id, $stock_size){
    return $this->updateStock($stock_qty, $prod_id, $stock_size);
  }

  public function removeRecord(){
    return $this->deleteProductRecord($this->prod_id);
  }

  public function removeImage($img_name){
    $result = $this->deleteImg($img_name);
    return $result;
  }

  public function removeImgRecord(){
    return $this->deleteImgRecord($this->prod_id);
  }

  public function removeStockRecord(){
    return $this->deleteStockRecord($this->prod_id);
  }

  // error handlers

  private function invalidName(){
    if(!preg_match("/[a-zA-Z0-9 \"()-]$/",$this->prod_name)){
      return true;
    }else{
      return false;
    }
  }
}