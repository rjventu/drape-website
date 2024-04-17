<?php include("includes/login.inc.php")?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

  <!-- SIDEBAR -->
  <?php include("../sidebar.php")?>

  <!--MAIN CONTENT -->
  <main>

    <!-- LOGIN FORM -->
    <section class="login-wrapper">
      <div class="row">
        <div class="col d-flex mt-5 mb-3">
          <img src="../../icons/profile-user.png" alt="Profile Picture" class="profile-picture"> 
        </div>
      </div>
      <div class="row status-messages my-2 d-flex">
        <?php  
          if (!empty($error_msg)){
          ?> 
          <span class="alert alert-danger w-25 text-center"><?php echo $error_msg; ?></span> 
          <?php  
          }
        ?>
      </div>
      <div class="row">
        <div class="col d-flex mt-3 mb-3">
          <form action="#" method="post">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="pass" class="form-control mt-4" placeholder="Password" required>
            <button type="submit" name="submit" class="btn-black-active mt-5 btn-logreg-major">LOGIN ></button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex">
          <a href="registration.php" class="btn-black btn-logreg-minor">REGISTER ></a>
        </div>
      </div>
    </section>

  </main>    
        
  </body>
</html>
