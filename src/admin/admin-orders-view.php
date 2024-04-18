<?php include("includes/admin-session.inc.php")?>

<?php
// this is just a placeholder
$order_status = "Pending";
?>
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

          <!-- Left Side -->
          <div class="col-7 view-order-left">
            <div class="row order-items-header">
              <h1><strong>ORDER 134</strong></h1>
              <h4>Date and Time</h3>
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
                <div class="row oit-body">
                  <div class="col-6">ITEM X</div>
                  <div class="col-2">x1</div>
                  <div class="col-4 text-end">₱29.99</div>
                </div>  
                
                <div class="row oit-body">
                  <div class="col-6">ITEM Y</div>
                  <div class="col-2">x1</div>
                  <div class="col-4 text-end">₱13.50</div>
                </div>  

                <div class="row oit-body">
                  <div class="col-6">ITEM Z</div>
                  <div class="col-2">x99</div>
                  <div class="col-4 text-end">₱299.99</div>
                </div>  

                <!-- Shipping -->
                <hr>
                <div class="row oit-shipping">
                  <div class="col">SHIPPING</div>
                  <div class="col text-end">₱5000.00</div>
                </div>
                <hr>

                <!-- Total Amount -->
                <div class="row oit-total">
                  <div class="col">TOTAL</div>
                  <div class="col text-end">₱2001650.00</div>
                </div>
                
              </div>
            </div>
            
          </div>

          <!-- Right Side -->
          <div class="col order-details">
            <div class="row od-name">
              <h1>Layla Customer</h1>
              <h2>laylaconsumer</h2>
            </div>
            <div class="row od-contact">
              <p>laylabuys@gmail.com</p>
              <p>(+** **** **** **)</p>
            </div>
            <div class="row od-address">
              <p>Random st. 777, at place,</p>
              <p>at region, at country,</p>
              <p> plus zip code</p>
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