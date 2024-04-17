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

  public function getCatTable($cat_name){
    $result = $this->readCatTable($cat_name);
    return $result;
  }

  public function getRecord($prod_id){
    $result = $this->readProductRecord($prod_id);
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



  // public function editProduct(){
  //   if($this->invalidName()){
  //     return "Error: Invalid name! Valid characters include: a-z A-Z 0-9 \" () - ";
  //   }
  //   return $this->updateProduct($this->prod_name, $this->prod_price, $this->prod_description, $this->prod_image, $this->prod_image_file, $this->bestseller, $this->cat_name, $this->prod_id);
  // }

  // public function editProductNoImg(){
  //   if($this->invalidName()){
  //     return "Error: Invalid name! Valid characters include: a-z A-Z 0-9 \" () - ";
  //   }
  //   return $this->updateProductNoImg($this->prod_name, $this->prod_price, $this->prod_description, $this->bestseller, $this->cat_name, $this->prod_id);
  
  // }
  public function removeRecord(){
    return $this->deleteProductRecord($this->prod_id);
  }

  public function getCatName($cat_id){
    $cat_name = $this->readCatName($cat_id);
    return $cat_name;
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