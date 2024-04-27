<?php include("includes/admin-session.inc.php")?>

<?php
require "../main/includes/functions.php";
include("../classes/Database.class.php");
include("../classes/Order.class.php");
include("../classes/OrderCon.class.php");

$order = new OrderController();

// check if orders table is empty
$result = $order->getTable();
list($empty_style, $full_style) = checkIfEmpty($result);
$result = $order->getTable();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // search bar
  $order = new OrderController();
  $result = $order->getSearchTable($_POST['search_item']);
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
    <main class="admin-wrapper">
        
        <!-- HEADER -->
        <section class="user-info mb-5">
          <div class="row">
            <div class="col d-flex justify-content-between">
              <h1><?php echo $_SESSION["adminUser"]?></h1>
              <a href="admin-registration.php" class="btn-black">CREATE NEW ADMIN ></a>
            </div>
          </div>
        </section>

        <!-- PANEL NAVIGATION -->
        <section class="panel-navigation mb-5">
          <div class="row">
            <div class="col">
              <a href="admin-inventory.php" class="btn-black me-5">INVENTORY ></a>
              <a href="admin-orders.php" class="btn-black-active">ORDERS ></a>
            </div>
          </div>
        </section>

        <section class="panel-table-wrapper text-center" style="margin-top: 6rem;<?php echo $empty_style?>">
          <h1>There are no orders.</h1>
          <h2>Orders submitted by customers would appear here.</h2>
        </section>

        <!-- TABLE -->
        <section class="panel-table-wrapper" style="<?php echo $full_style?>">
          
          <!-- Search Bar -->
          <div class="row search-row">
            <div class="col d-flex justify-content-between align-items-center">
              <div class="search-bar">
                <form action="admin-orders.php" method="post" enctype="multipart/form-data">
                  <input type="text" name="search_item" placeholder="SEARCH/FILTER...">
                  <input type="submit" name="filter" value="">
                </form>
              </div>
            </div>
          </div>

          <!-- Actual Table -->
          <div class="row mt-5 panel-table">
            <div class="col pe-0">

              <!-- Table Head -->
              <div class="row panel-table-head mb-2">
                <div class="col pth-contents-wrapper">
                  <div class="row">
                    <p class="col-2 mb-0">ID</p>
                    <p class="col mb-0">Order Username</p>
                    <p class="col-3 mb-0 text-end">Status</p>
                  </div>
                </div>
                <div class="col-1"></div>
              </div>

              <!-- Table Body -->
              <?php
              while($row = $result->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="row panel-table-body mb-4">
                  <div class="col ptb-contents-wrapper" onclick="window.location.href = 'admin-orders-view.php?id=<?php echo $row['order_id']?>';">
                    <div class="row">
                      <p class="col-2 mb-0"><?php echo $row['order_id']?></p>
                      <p class="col mb-0 ptb-username"><?php echo $row['cust_user']?></p>
                      <p class="col-3 mb-0 text-end"><?php echo $row['order_status']?></p>
                    </div>
                  </div>
                  <div class="col-1 ptb-links"><a href="admin-orders-edit.php?id=<?php echo $row['order_id']?>"><i class="fi fi-rr-pencil"></i></a></div>
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