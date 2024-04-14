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
        <div class="col d-flex mt-5 text-center">
          <h1><strong>CREATE A <br /> NEW ACCOUNT</strong></h1> 
        </div>
      </div>
      <div class="row">
        <div class="col d-flex mt-5 mb-3">
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Username">
            <input type="email" class="form-control mt-4" placeholder="Email">
            <input type="password" class="form-control mt-4" placeholder="Password">
            <input type="password" class="form-control mt-4" placeholder="Repeat Password">
            <button type="submit" class="btn-black-active mt-5 btn-logreg-major">CREATE ACCOUNT ></button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex">
          <button type="button" class="btn-black btn-logreg-minor" onclick="history.back();">BACK ></button>
        </div>
      </div>
    </section>

  </main>    
        
  </body>
</html>
