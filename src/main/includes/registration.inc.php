<?php 
session_start();

// if(!isset($_SESSION["adminid"])){
//   header("location: admin-login.php");
// }
// else
// {
$success_msg = $error_msg = "";

if(isset($_POST["submit"]))
{
  $user = $_POST["user"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $passRepeat = $_POST["passRepeat"];

  include("../classes/Database.class.php");
  include("../classes/Signup.class.php");
  include("../classes/SignupCon.class.php");

  $signup = new SignupController($user, $email, $pass, $passRepeat);
  $error_msg = $signup->signupCust();

  if(empty($error_msg)){
    $success_msg = "Account created successfully!";
  }
}
// }
