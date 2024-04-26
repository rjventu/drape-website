<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav flex-column justify-content-between">
      <div class="top-links">
        <li class="nav-item">
          <?php $target = "src/main/index.php";?>
          <a class="nav-link d-flex" aria-current="page" href="<?php echo $target?>">
          <img src="icons/home.png" id="active-icon">
          </a>
        </li>
        <li class="nav-item">
          <?php $target = "src/main/shop.php";?>
          <a class="nav-link d-flex" href="<?php echo $target?>">
          <i class="fi fi-rr-apps"></i>
          </a>
        </li>
        <li class="nav-item">
          <?php $target = "src/main/contacts.php";?>
          <a class="nav-link d-flex" href="<?php echo $target?>">
          <i class="fi fi-rr-phone-call"></i>
          </a>
        </li>
        <li class="nav-item">
          <?php $target = "src/main/cart.php"; ?>
          <a class="nav-link d-flex" href="<?php echo $target?>">
          <i class="fi fi-rr-shopping-cart"></i>
          </a>
        </li>
      </div>
      <div class="bottom-links">
        <li class="nav-item bottom-links">
          <?php
            // User is an admin
            if(isset($_SESSION["adminId"])){
              $target = "src/admin/admin-inventory.php";
              ?>
                <a class="nav-link d-flex" aria-current="page" href="<?php echo $target?>">
                  <img src="icons/admin.png" id="active-icon">
                </a>
                <a class="nav-link d-flex" href="src/main/logout.php">
                  <i class="fi fi-rr-exit"></i>
                </a>
              <?php
            // User is a Customer
            }elseif(isset($_SESSION["custId"])){
              $target = "src/client/client-orders.php";
              ?>
                <a class="nav-link d-flex" aria-current="page" href="<?php echo $target?>">
                  <img src="icons/user.png" id="active-icon">
                </a>
                <a class="nav-link d-flex" href="src/main/logout.php">
                  <i class="fi fi-rr-exit"></i>
                </a>
              <?php
            // User is not authenticated
            }else{
            ?>
              <a class="nav-link d-flex" href="src/main/login.php">
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