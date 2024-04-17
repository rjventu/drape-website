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

  //gets values from form
  $prod_name = $_POST["prod_name"];
  $prod_price = $_POST["prod_price"];
  $prod_description = $_POST["prod_description"];
  $cat_name = $_POST["cat_name"];
  $files = $_FILES;

  // files error handling
  if($files['new']['name'][0] == ""){
    $error_msg = "Please select at least one image.";
  }

  // Add product to db
  if(empty($error_msg)){
    $product = new ProductController(null, $prod_name, $prod_price, $prod_description, $cat_name);
    $prod_id = $product->addProduct();
  }

  // upload images to folder and to db
  if(empty($error_msg)){

    // destination folder
    $folder = "../../images/uploads/";

    $files_array = getFilesArray($files);
    uploadFiles($files_array, $folder);

    // upload to db
    foreach($files_array as $tmp_folder => $img_name){
      $product->addImage($prod_id, $img_name);
    }

    $success_msg = "Product added successfully!";
  }
}