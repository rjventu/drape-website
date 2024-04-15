<?php

class Signup extends Database{

  protected function checkCustUser($user){
    $query = 'SELECT cust_user FROM customer WHERE cust_user = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($user))){
      $stmt = null;
      return "Error: Statement failed";
    }
    
    if($stmt->rowCount() > 0){
      $stmt = null;
      return true;
    }else{
      $stmt = null;
      return false;
    }
  }
  
  protected function checkCustEmail($email){
    $query = 'SELECT cust_email FROM customer WHERE cust_email = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($email))){
      $stmt = null;
      return "Error: Statement failed";
    }

    if($stmt->rowCount() > 0){
      $stmt = null;
      return true;
    }else{
      $stmt = null;
      return false;
    }

  }
  
  protected function checkAdminUser($user){
    $query = 'SELECT admin_user FROM admin WHERE admin_user = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($user))){
      $stmt = null;
      return "Error: Statement failed";
    }
    
    if($stmt->rowCount() > 0){
      $stmt = null;
      return true;
    }else{
      $stmt = null;
      return false;
    }
  }

  protected function checkAdminEmail($email){
    $query = 'SELECT admin_email FROM admin WHERE admin_email = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($email))){
      $stmt = null;
      return "Error: Statement failed";
    }

    if($stmt->rowCount() > 0){
      $stmt = null;
      return true;
    }else{
      $stmt = null;
      return false;
    }

  }
  
  protected function setCust($user, $email, $pass){
    $query = 'INSERT INTO customer (cust_user, cust_email, cust_pass) VALUES (?, ?, ?);';
    $stmt = $this->connect()->prepare($query);

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    if(!$stmt->execute(array($user, $email, $hashedPass))){
      $stmt = null;
      return "Error: Statement failed!";
    }

    $stmt = null;
    return "";
  }

  protected function setAdmin($user, $email, $pass){
    $query = 'INSERT INTO admin (admin_user, admin_email, admin_pass) VALUES (?, ?, ?);';
    $stmt = $this->connect()->prepare($query);

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    if(!$stmt->execute(array($user, $email, $hashedPass))){
      $stmt = null;
      return "Error: Statement failed!";
    }

    $stmt = null;
    return "";
  }
}