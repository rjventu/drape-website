<?php
session_start();

if(!isset($_SESSION["custId"])){
  header("location: ../main/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar.php")?>

    <!-- MAIN CONTENT -->
    <main class="client-wrapper">
        
        <!-- HEADER -->
        <section class="user-info mb-5">
          <div class="row">
            <div class="col d-flex justify-content-between">
              <h1><?=$_SESSION["custUser"]?></h1>
            </div>
          </div>
        </section>

        <!-- PANEL NAVIGATION -->
        <section>
          <div class="row">
            <div class="col">
              <h1><strong>MY ORDERS</strong></h1>
            </div>
          </div>
        </section>

        <!-- TABLE -->
        <section class="panel-table-wrapper mt-3">
          <div class="row panel-table">
            <div class="col pe-0">

              <!-- Table Head -->
              <div class="row panel-table-head mb-2">
                <div class="col pth-contents-wrapper">
                  <div class="row">
                    <p class="col-4 mb-0">ID</p>
                    <p class="col mb-0">Total</p>
                    <p class="col-4 mb-0 text-end">Status</p>
                  </div>
                </div>
              </div>

              <!-- Table Body -->
              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="window.location.href = 'client-orders-view.php';">
                  <div class="row">
                    <p class="col-4 mb-0">134</p>
                    <p class="col mb-0">45000 PHP</p>
                    <p class="col-4 mb-0 text-end">SHIPPING</p>
                  </div>
                </div>
              </div>

              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="window.location.href = 'client-orders-view.php';">
                  <div class="row">
                    <p class="col-4 mb-0">122</p>
                    <p class="col mb-0">6000 PHP</p>
                    <p class="col-4 mb-0 text-end">ARRIVED</p>
                  </div>
                </div>
              </div>
              
              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="window.location.href = 'client-orders-view.php';">
                  <div class="row">
                    <p class="col-4 mb-0">4</p>
                    <p class="col mb-0">250 PHP</p>
                    <p class="col-4 mb-0 text-end">ARRIVED</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>
        
    </main>

</body>
</html>