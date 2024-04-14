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
        <div class="col d-flex mt-5">
          <img src="../../icons/profile-user.png" alt="Profile Picture" class="profile-picture"> 
        </div>
      </div>
      <div class="row">
        <div class="col d-flex mt-5 mb-3">
          <form action="#" method="post">
            <input type="email" class="form-control" placeholder="Email">
            <input type="password" class="form-control mt-4" placeholder="Password">
            <button type="submit" class="btn-black-active mt-5 btn-logreg-major">LOGIN ></button>
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
