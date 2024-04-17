<?php

session_start();

if(!isset($_SESSION["adminId"])){
  header("location: ../main/login.php");
}