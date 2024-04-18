<?php 
include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

require "functions.php";

// set folder destination
$folder = "../../images/uploads/";

if($_SERVER['REQUEST_METHOD'] === 'GET'){

  $prod_id = $_GET["id"];

  $product = new ProductController();
  $result = $product->getRecord($prod_id);
  $row = $result->fetch(PDO::FETCH_ASSOC);

  // get prod details from db
  $prod_name = $row["prod_name"];
  $prod_price = $row["prod_price"];
  $prod_description = $row["prod_description"];
  $cat_name = $row["cat_name"];

  // get images from db
  $img_array = $product->getRecordImg($prod_id);

  // concat folder destination and image file name
  foreach($img_array as &$img){
    $img = $folder.$img;
  }

  // get stock from db
  $stocks_array = $product->getRecordStock($prod_id);

}else{

  $success_msg = $error_msg = "";

  $prod_id = $_POST["prod_id"];
  $product = new ProductController();
  
  // basic details
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

  //////////////// UPDATING BASIC DETAILS //////////////////

  $product = new ProductController($prod_id, $prod_name, $prod_price, $prod_description, $cat_name);
  $error_msg = $product->editProduct();

  //////////////// UPDATING STOCK //////////////////

  if(empty($error_msg)){
    foreach($stocks_array as $stock_size => $stock_qty){
      $error_msg = $product->editStock($stock_qty, $prod_id, $stock_size);
    }    
  }
  $stocks_array = $product->getRecordStock($prod_id);

  //////////////// UPDATING IMAGES //////////////////

  // Check if there are any images selected
  if(!isset($_POST["old"])){
    if($files['photos']['name'][0] === ""){
      $error_msg = "Please select at least one image.";
    }
  }

  // Set preloaded image array
  if(empty($error_msg)){
    if(isset($_POST["old"])){
      $old_img_array = prepareArray($_POST["old"]);
    }
  }

  // Check if user deleted all preloaded images
  if(empty($error_msg)){
    if(!isset($_POST["old"])){
      $db_img_array = $product->getRecordImg($prod_id); 
      foreach($db_img_array as $db_img){
        $error_msg = $product->removeImage($db_img);
        if(empty($error_msg)){
          deleteFile($db_img);
        }
      }
    }
  }

  // Check if user added new images
  if(empty($error_msg)){
    if($files['photos']['name'][0] !== ""){
      $files_array = getFilesArray($files);
      uploadFiles($files_array, $folder);

      // upload to db
      foreach($files_array as $tmp_folder => $img_name){
        $error_msg = $product->addImage($prod_id, $img_name);
        if(isset($_POST["old"])){
          array_push($old_img_array, $img_name);
        }
      }
    }
  }

  // Check if user deleted any images
  if(empty($error_msg)){
    if(isset($_POST["old"])){

      $db_img_array = $product->getRecordImg($prod_id); 
    
      // check if preloaded images match with db,
      // delete if they do not match 
      foreach($db_img_array as $db_img){
        $match = false;
        foreach($old_img_array as $old_img){
          if($db_img == $old_img){
            $match = true;
          }
        }

        if($match === false){
          //remove img from db
          echo "<script> alert('Image ".$db_img." was removed'); </script>";
          $error_msg = $product->removeImage($db_img);
          if(empty($error_msg)){
            deleteFile($db_img);
          }
        }
      }
    }
  }

  $img_array = setImgArray($product, $prod_id);

  if(empty($error_msg)){
    $success_msg = "Product edited successfully!";
  }
}
