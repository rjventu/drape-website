<?php

class LoginController extends Login{

  private $email;
  private $pass;

  public function __construct($email, $pass){
    $this->email = $email;
    $this->pass = $pass;
  }

  public function loginUser(){
    if($this->emptyInput()){
      return "Error: Please complete all fields.";
    }
    return $this->getUserCategory($this->email, $this->pass);
  }

  // Error Handlers

  private function emptyInput(){
    if(isset($this->email) && isset($this->pass)){
      return false;
    }else{
      return true;
    }
  }
}