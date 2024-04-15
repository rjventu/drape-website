<?php include("includes/admin-registration.inc.php")?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

  <!-- SIDEBAR -->
  <?php include("../sidebar.php")?>

  <!--MAIN CONTENT -->
  <main>

    <!-- REGISTRATION FORM -->
    <section class="login-wrapper">
      <div class="row">
        <div class="col d-flex mt-5 mb-2 text-center">
          <h1><strong>CREATE A NEW <br /> ADMIN ACCOUNT</strong></h1> 
        </div>
      </div>
      <div class="row status-messages my-2 d-flex">
        <?php  
          if(!empty($success_msg)){ 
          ?> 
          <span class="alert alert-success w-25 text-center"><?php echo $success_msg; ?></span> 
          <?php  
          }
          if (!empty($error_msg)){
          ?> 
          <span class="alert alert-danger w-25 text-center"><?php echo $error_msg; ?></span> 
          <?php  
          }
        ?>
      </div>
      <div class="row">
        <div class="col d-flex my-3">
          <form action="admin-registration.php" method="post">
            <input type="text" name="user" class="form-control" placeholder="Username" required>
            <input type="email" name="email" class="form-control mt-4" placeholder="Email" required>
            <input type="password" name="pass" class="form-control mt-4" placeholder="Password" required>
            <input type="password" name="passRepeat" class="form-control mt-4" placeholder="Repeat Password" required>
            <button type="submit" name="submit" class="btn-black-active mt-5 btn-logreg-major">CREATE ACCOUNT ></button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex">
          <button type="button" class="btn-black btn-logreg-minor" onclick="window.location.href = 'admin-inventory.php';">< BACK</button>
        </div>
      </div>
    </section>

  </main>    
        
  </body>
</html>
