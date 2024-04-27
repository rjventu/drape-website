<?php
session_start();

if(!isset($_SESSION["custId"])){
  header("location: ../main/login.php");
}
?>

<?php 
require "../main/includes/functions.php";
include("includes/client-orders.inc.php");
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

        <section class="panel-table-wrapper text-center" style="margin-top: 6rem;<?php echo $empty_style?>">
          <h1>Your order history is empty.</h1>
          <h2>Submit an order to see it here!</h2>
        </section>

        <!-- TABLE -->
        <section class="panel-table-wrapper mt-3" style="<?php echo $full_style?>">
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
              <?php
              $result = $order->getTableCust();
              while($row = $result->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="row panel-table-body mb-4">
                  <div class="col ptb-contents-wrapper" onclick="window.location.href = 'client-orders-view.php?id=<?php echo $row['order_id']?>';">
                    <div class="row">
                      <p class="col-4 mb-0"><?php echo $row['order_id']?></p>
                      <p class="col mb-0"><?php echo $row['order_total']?> PHP</p>
                      <p class="col-4 mb-0 text-end"><?php echo $row['order_status']?></p>
                    </div>
                  </div>
                </div>
                <?php
                }
              ?>
            </div>
          </div>
        </section>
        
    </main>

</body>
</html>