<?php 

$success_msg = $error_msg = "";

include("../classes/Database.class.php");
include("../classes/Signup.class.php");
include("../classes/SignupCon.class.php");

if(isset($_POST["submit"]))
{
  $user = $_POST["user"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $passRepeat = $_POST["passRepeat"];

  $signup = new SignupController($user, $email, $pass, $passRepeat);
  $error_msg = $signup->signupAdmin();

  if(empty($error_msg)){
    $success_msg = "Account created successfully!";
  }
}
