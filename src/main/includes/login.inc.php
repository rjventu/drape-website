<?php 
error_reporting(E_ALL ^ E_NOTICE);  
session_start();

if (isset($_SESSION["custId"])){
  header("location: ../client/client-orders.php");
}else if (isset($_SESSION["adminId"])){
  header("location: ../admin/admin-inventory.php");
}else{
  $error_msg = "";
  
  if(isset($_POST["submit"]))
  {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
  
    include("../classes/Database.class.php");
    include("../classes/Login.class.php");
    include("../classes/LoginCon.class.php");
  
    $login = new LoginController($email, $pass);
    $error_msg = $login->loginUser();
  
    if(empty($error_msg)){
      if (isset($_SESSION["custId"])){
        header("location: ../client/client-orders.php");
      }else if (isset($_SESSION["adminId"])){
        header("location: ../admin/admin-inventory.php");
      }
    }
  }
}
