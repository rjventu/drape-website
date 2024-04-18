<?php
include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");
$product = new ProductController();
$result = $product->getTable();

require "includes/functions.php";

$error_msg = "";

if(isset($_GET['id'])){
  $prod_id = $_GET['id'];
  $product = new ProductController($prod_id);

  $db_img_array = $product->getRecordImg($prod_id);
  foreach($db_img_array as $db_img){
    deleteFile($db_img);
  }

  $product->removeImgRecord();
  $product->removeStockRecord();
  $product->removeRecord();

  echo '<script>alert("Product Deleted Successfully!")</script>';

  $product = new ProductController();
  $result = $product->getTable();
}
