<?php

function getFilesArray($files){
  $names = $files['photos']['name'];
  $tmp_names = $files['photos']['tmp_name'];

  foreach($names as &$name){
    $name = uniqid('', false)."_".$name;
  }

  $files_array = array_combine($tmp_names, $names);
  return $files_array;
}

function uploadFiles($files_array, $folder){
  foreach($files_array as $tmp_folder => $img_name){
    move_uploaded_file($tmp_folder, $folder.$img_name);
  }
}

function deleteFile($image_old){
  $fileDestination = '../../images/uploads/'.$image_old;
  $realFileDestination = realpath($fileDestination);

  if(is_writable($realFileDestination)){
    if(file_exists($realFileDestination)){
      unlink($realFileDestination);
    }
  }
}

function prepareArray($array){
  foreach($array as &$element){
    $array_broken = explode('/', $element);
    $element = end($array_broken);
  }

  return $array;
}

function setImgArray($product, $prod_id){
  // get images from db
  $img_array = $product->getRecordImg($prod_id);

  // concat folder destination and image file name
  foreach($img_array as &$img){
    $img = "../../images/uploads/".$img;
  }

  return $img_array;
}