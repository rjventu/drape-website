<?php 
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
$shop_pages = array(
  "shop.php", 
  "shop-category-acc.php", 
  "shop-category-hoodies.php",
  "shop-category-shirts.php"
);
$cart_pages = array(
  "cart.php",
  "checkout.php"
);
$client_pages = array(
  "client-orders.php",
  "client-view-orders.php"
);
$admin_pages = array(
  "admin-inventory.php",
  "admin-orders.php",
  "admin-registration.php"
);
?>

<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav flex-column justify-content-between">
      <div class="top-links">
        <li class="nav-item">
          <?php
            if(isset($_SESSION["adminId"]) || isset($_SESSION["custId"])){
              if(in_array($page, $admin_pages) || in_array($page, $client_pages))
                $target = "../main/index.php";
              else
                $target = "index.php";
            }else{$target = "index.php";}
          ?>
          <a class="nav-link d-flex" aria-current="page" href="<?php echo $target?>">
            <?php
              if($page == 'index.php'){
                ?>
                <img src="../../icons/home.png" id="active-icon">
                <?php
              }else{
                ?>
                <i class="fi fi-rr-home"></i>
                <?php
              }
            ?>
          </a>
        </li>
        <li class="nav-item">
          <?php
            if(isset($_SESSION["adminId"]) || isset($_SESSION["custId"])){
              if(in_array($page, $admin_pages) || in_array($page, $client_pages))
                $target = "../main/shop.php";
              else
                $target = "shop.php";
            }else{$target = "shop.php";}
          ?>
          <a class="nav-link d-flex" href="<?php echo $target?>">
            <?php
              if(in_array($page, $shop_pages)){
                ?>
                <img src="../../icons/apps.png" id="active-icon">
                <?php
              }else{
                ?>
                <i class="fi fi-rr-apps"></i>
                <?php
              }
            ?>
          </a>
        </li>
        <li class="nav-item">
          <?php
            if(isset($_SESSION["adminId"]) || isset($_SESSION["custId"])){
              if(in_array($page, $admin_pages) || in_array($page, $client_pages))
                $target = "../main/contacts.php";
              else
                $target = "contacts.php";
            }else{$target = "contacts.php";}
          ?>
          <a class="nav-link d-flex" href="<?php echo $target?>">
            <?php
              if($page == 'contacts.php'){
                ?>
                <img src="../../icons/phone-call.png" id="active-icon">
                <?php
              }else{
                ?>
                <i class="fi fi-rr-phone-call"></i>
                <?php
              }
            ?>
          </a>
        </li>
        <li class="nav-item">
          <?php
            if(isset($_SESSION["adminId"]) || isset($_SESSION["custId"])){
              if(in_array($page, $admin_pages) || in_array($page, $client_pages))
                $target = "../main/cart.php";
              else
                $target = "cart.php";
            }else{$target = "cart.php";}
          ?>
          <a class="nav-link d-flex" href="<?php echo $target?>">
            <?php
              if(in_array($page, $cart_pages)){
                ?>
                <img src="../../icons/shopping-cart.png" id="active-icon">
                <?php
              }else{
                ?>
                <i class="fi fi-rr-shopping-cart"></i>
                <?php
              }
            ?>
          </a>
        </li>
      </div>
      <div class="bottom-links">
        <li class="nav-item bottom-links">
          <?php
            // User is an admin
            if(isset($_SESSION["adminId"])){
              if(in_array($page, $admin_pages)){$target = "admin-inventory.php";}
              else{$target = "../admin/admin-inventory.php";}
              ?>
                <a class="nav-link d-flex" aria-current="page" href="<?php echo $target?>">
                  <img src="../../icons/admin.png" id="active-icon">
                </a>
                <a class="nav-link d-flex" href="../main/logout.php">
                  <i class="fi fi-rr-exit"></i>
                </a>
              <?php
            // User is a Customer
            }elseif(isset($_SESSION["custId"])){
              if(in_array($page, $client_pages)){$target = "client-orders.php";}
              else{$target = "../client/client-orders.php";}
              ?>
                <a class="nav-link d-flex" aria-current="page" href="<?php echo $target?>">
                  <img src="../../icons/user.png" id="active-icon">
                </a>
                <a class="nav-link d-flex" href="../main/logout.php">
                  <i class="fi fi-rr-exit"></i>
                </a>
              <?php
            // User is not authenticated
            }else{
            ?>
              <a class="nav-link d-flex" href="login.php">
                <i class="fi fi-rr-user"></i>
              </a>
            <?php
            }
          ?>
        </li> 
      </div>
    </ul>
  </nav>
</div>