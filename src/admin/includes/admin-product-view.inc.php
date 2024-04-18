<?php 

include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

require "functions.php";

if($_SERVER['REQUEST_METHOD'] === 'GET'){

  $prod_id = $_GET["id"];

  $product = new ProductController();
  $result = $product->getRecord($prod_id);
  $row = $result->fetch(PDO::FETCH_ASSOC);

  // basic details
  $prod_name = $row["prod_name"];
  $prod_price = $row["prod_price"];
  $prod_description = $row["prod_description"];
  $cat_name = $row["cat_name"];

  // images
  $img_array = setImgArray($product, $prod_id);

  // stock
  $stock_array = $product->getRecordStock($prod_id);
}

