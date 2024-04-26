<?php include("includes/admin-session.inc.php")?>

<?php include("includes/admin-orders-view.inc.php");?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar.php")?>

    <!-- MAIN CONTENT -->
    <main>

      <section class="view-order-back">
        <button type="button" class="btn-black" onclick="window.location.href = 'admin-orders.php';">< BACK</button>
      </section>

      <!-- ORDER INFO -->
      <section class="view-order-wrapper mt-5">
        <div class="row">

          <?php
          while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $order_id = $row["order_id"];
            $order_time = $row["order_time"];
          }
          ?>

          <!-- Left Side -->
          <div class="col-7 view-order-left">
            <div class="row order-items-header">
              <h1><strong>ORDER <?php echo $order_id?></strong></h1>
              <h4><?php echo $order_time?></h3>
            </div>

            <!-- Order Items Table -->
            <div class="row order-items-table mt-4">
              <div class="col">

                <!-- Table Head -->
                <div class="row oit-head">
                  <div class="col-6">PRODUCT</div>
                  <div class="col-2"></div>
                  <div class="col-4 text-end">SUBTOTAL</div>
                </div>  

                <!-- Table Body -->
                <?php
                $result = $order->getRecord($order_id);
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  $subtotal = $row["item_qty"] * $row["item_price"];
                  ?>
                  <div class="row oit-body">
                    <div class="col-7"><?php echo $row["item_name"]?> (<?php echo $row["item_size"]?>)</div>
                    <div class="col-1">x<?php echo $row["item_qty"]?></div>
                    <div class="col-4 text-end">₱<?php echo $subtotal?></div>
                  </div> 
                  <?php
                  $order_total = $row["order_total"];
                }
                ?>

                <!-- Shipping -->
                <hr>
                <div class="row oit-shipping">
                  <div class="col">SHIPPING</div>
                  <div class="col text-end"><?php echo $shippingCost?> PHP</div>
                </div>
                <hr>

                <!-- Total Amount -->
                <div class="row oit-total">
                  <div class="col">TOTAL</div>
                  <div class="col text-end"><?php echo $order_total?> PHP</div>
                </div>
                
              </div>
            </div>
            
          </div>

          <!-- Right Side -->

          <?php
          $result = $order->getRecord($order_id);
          $row = $result->fetch(PDO::FETCH_ASSOC);
          
          $cust_fullname = trim($row["order_fname"]) . " " . trim($row["order_lname"]);
          $cust_user = $row["cust_user"];
          $order_email = $row["order_email"];
          $order_phone = $row["order_phone"];
          $order_address = $row["order_address"];
          $order_region = $row["order_region"];
          $order_zip = $row["order_zip"];
          $order_remarks = $row["order_remarks"];
          $order_status = $row["order_status"];
          ?>
          <div class="col order-details">
            <div class="row od-name">
              <h1><?php echo $cust_fullname?></h1>
              <h2><?php echo $cust_user?></h2>
            </div>
            <div class="row od-contact">
              <p><?php echo $order_email?></p>
              <p><?php echo $order_phone?></p>
            </div>
            <div class="row od-address">
              <p><?php echo $order_address?></p>
              <p><?php echo $order_region?></p>
              <p><?php echo $order_zip?></p>
            </div>
            <div class="row od-status mb-5">
              <div class="form-group">
                <div class="form-group-label d-flex">
                  <h5><strong>REMARKS</strong></h5>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <p><?php echo $order_remarks?></p>
                </div>
              </div>
            </div>
            <form class="row od-status">
              <div class="form-group">
                <div class="form-group-label d-flex">
                  <h5><strong>STATUS</strong></h5>
                </div>
                <div class="od-status-input d-flex justify-content-between align-items-center">
                  <select name="order_status" id="order_status" class="form-select" disabled>
                    <option value="Pending"<?=$order_status == 'Pending' ? ' selected="selected"' : '';?>>Pending</option>
                    <option value="Paid"<?=$order_status == 'Paid' ? ' selected="selected"' : '';?>>Paid</option>
                    <option value="Shipped"<?=$order_status == 'Shipped' ? ' selected="selected"' : '';?>>Shipped</option>
                    <option value="Delivered"<?=$order_status == 'Delivered' ? ' selected="selected"' : '';?>>Delivered</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
        
    </main>

</body>
</html>