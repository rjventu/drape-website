<?php 
include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

$prod_id = $_GET["prod_id"];
$product = new ProductController();
$result = $product->getRecord($prod_id);
$row = $result->fetch(PDO::FETCH_ASSOC);

$prod_name = $row['prod_name'];
$prod_price = $row['prod_price'];
$prod_description = $row['prod_description'];

$prod_image = $product->getRecordImgThumb($prod_id);

$img_array = $product->getRecordImg($prod_id);
$shifted = array_shift($img_array);
