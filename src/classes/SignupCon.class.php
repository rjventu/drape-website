<?php

class SignupController extends Signup{

  private $user;
  private $email;
  private $pass;
  private $passRepeat;

  public function __construct($user, $email, $pass, $passRepeat){
    $this->user = $user;
    $this->email = $email;
    $this->pass = $pass;
    $this->passRepeat = $passRepeat;
  }

  public function signupCust(){
    if($this->emptyInput()){
      return "Error: Please complete all fields.";
    }
    if($this->invalidName()){
      return "Error: Invalid username. Please limit your username to 3 to 20 alphanumeric characters and underscores.";
    }
    if($this->invalidEmail()){
      return "Error: Please input a valid email address.";
    }
    if($this->noMatch()){
      return "Error: Your passwords are not matching.";
    }
    if($this->custUserExists()){
      return "Error: This username is already taken.";
    }
    if($this->custEmailExists()){
      return "Error: This email is already taken.";
    }

    return $this->setCust($this->user, $this->email, $this->pass);
  }

  public function signupAdmin(){
    if($this->emptyInput()){
      return "Error: Please complete all fields.";
    }
    if($this->invalidName()){
      return "Error: Invalid username. Please limit your username to 3 to 20 alphanumeric characters and underscores.";
    }
    if($this->invalidEmail()){
      return "Error: Please input a valid email address.";
    }
    if($this->noMatch()){
      return "Error: Passwords do not match.";
    }
    if($this->adminUserExists()){
      return "Error: This username is already taken.";
    }
    if($this->adminEmailExists()){
      return "Error: This email is already taken.";
    }

    return $this->setAdmin($this->user, $this->email, $this->pass);
  }

  // Error Handlers

  private function emptyInput(){
    if(empty($this->user) ||empty($this->email) || empty($this->pass) || empty($this->passRepeat)){
      return true;
    }else{
      return false;
    }
  }

  private function invalidName(){
    if(!preg_match("/^[a-z\d_]{3,20}$/i",$this->user)){
      return true;
    }else{
      return false;
    }
  
  }

  private function invalidEmail(){
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      return true;
    }else{
      return false;
    }
  }
  
  private function noMatch(){
    if($this->pass !== $this->passRepeat){
      return true;
    }else{
      return false;
    }
  }

  private function custUserExists(){
    if($this->checkCustUser($this->user)){
      return true;
    }else{
      return false;
    }
  }

  private function custEmailExists(){
    if($this->checkCustEmail($this->email)){
      return true;
    }else{
      return false;
    }
  }

  private function adminUserExists(){
    if($this->checkAdminUser($this->user)){
      return true;
    }else{
      return false;
    }
  }

  private function adminEmailExists(){
    if($this->checkAdminEmail($this->email)){
      return true;
    }else{
      return false;
    }
  }

}