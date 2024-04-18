<?php

$success_msg = $error_msg = "";

include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

require "functions.php";

$prod_id = null;

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $success_msg = $error_msg = "";

  // get values from form
  $prod_name = $_POST["prod_name"];
  $prod_price = $_POST["prod_price"];
  $prod_description = $_POST["prod_description"];
  $cat_name = $_POST["cat_name"];
  
  // get stocks array
  $stocks = $_POST["stock"];
  $sizes = array("XS", "S", "M", "L", "XL", "XXL");
  $stocks_array = array_combine($sizes, $stocks);

  // get submitted files 
  $files = $_FILES;

  // files error handling
  if($files['photos']['name'][0] == ""){
    $error_msg = "Please select at least one image.";
  }

  // Add product to db
  if(empty($error_msg)){
    $product = new ProductController(null, $prod_name, $prod_price, $prod_description, $cat_name);
    $result = $product->addProduct();

    $int_result = (int) $result;
    if($int_result === 0){
      // returned value is an error message string 
      $error_msg = $result;
    }else{
      // returned value is the product id
      $prod_id = $result;
    }
  }

  // Add stock quantities to db
  if(empty($error_msg)){
    foreach($stocks_array as $stock_size => $stock_qty){
      $error_msg = $product->addStock($prod_id, $stock_size, $stock_qty);
    }
  }

  // Upload images to folder and to db
  if(empty($error_msg)){

    // destination folder
    $folder = "../../images/uploads/";

    $files_array = getFilesArray($files);
    uploadFiles($files_array, $folder);

    // upload to db
    foreach($files_array as $tmp_folder => $img_name){
      $error_msg = $product->addImage($prod_id, $img_name);
    }
  }

  if(empty($error_msg)){
    $success_msg = "Product added successfully!";
  }
}