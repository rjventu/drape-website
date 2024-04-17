<?php

function getFilesArray($files){
  $names = $files['new']['name'];
  $tmp_names = $files['new']['tmp_name'];

  $files_array = array_combine($tmp_names, $names);
  return $files_array;
}

function uploadFiles($files_array, $folder){
  foreach($files_array as $tmp_folder => $img_name){
    move_uploaded_file($tmp_folder, $folder.$img_name);
  }
}