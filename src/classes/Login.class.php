<?php

class Login extends Database{

  protected function getUserAdmin($email, $pass, $stmt){
    $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPass = password_verify($pass, $passHashed[0]["admin_pass"]);

    if(!$checkPass){
      $stmt = null;
      return "Error: Incorrect password.";
    }elseif($checkPass){
      $query = 'SELECT * FROM admin WHERE admin_email = ? AND admin_pass = ?;';
      $stmt = $this->connect()->prepare($query);

      if(!$stmt->execute(array($email, $passHashed[0]["admin_pass"]))){
        $stmt = null;
        return "Error: Statement failed.";
      }

      if($stmt->rowCount() == 0){
        $stmt = null;
        return "Error: User not found.";
      }

      $admin = $stmt->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["adminId"] = $admin[0]["admin_id"];
      $_SESSION["adminUser"] = $admin[0]["admin_user"];
      $_SESSION["adminEmail"] = $admin[0]["admin_email"];

      $stmt = null;
      return "";
    }
  }

  protected function getUserCust($email, $pass, $stmt){
    $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPass = password_verify($pass, $passHashed[0]["cust_pass"]);

    if(!$checkPass){
      $stmt = null;
      return "Error: Incorrect password.";
    }elseif($checkPass){
      $query = 'SELECT * FROM customer WHERE cust_email = ? AND cust_pass = ?;';
      $stmt = $this->connect()->prepare($query);

      if(!$stmt->execute(array($email, $passHashed[0]["cust_pass"]))){
        $stmt = null;
        return "Error: Statement failed.";
      }

      if($stmt->rowCount() == 0){
        $stmt = null;
        return "Error: User not found.";
      }

      $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["custId"] = $customer[0]["cust_id"];
      $_SESSION["custUser"] = $customer[0]["cust_user"];
      $_SESSION["custEmail"] = $customer[0]["cust_email"];

      $stmt = null;
      return "";
    }
  }

  protected function getUserCategory($email, $pass){
    // Check if user is an Admin
    $query = 'SELECT admin_pass FROM admin WHERE admin_email = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($email))){
      $stmt = null;
      return "Error: Statement failed.";
    }

    if($stmt->rowCount() == 0){
      // User is not an Admin, check if user is a Customer
      $stmt = null;
      $query = 'SELECT cust_pass FROM customer WHERE cust_email = ?;';
      $stmt = $this->connect()->prepare($query);

      if(!$stmt->execute(array($email))){
        $stmt = null;
        return "Error: Statement failed.";
      }

      if($stmt->rowCount() == 0){
        $stmt = null;
        // User is not an Admin or a Customer, so they are not registered
        return "Error: User not found.";
      }

      // User is a Customer, so get user info
      return $this->getUserCust($email, $pass, $stmt);
    }

    // User is an Admin, so get user info
    return $this->getUserAdmin($email, $pass, $stmt);
  }
}