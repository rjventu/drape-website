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
?>

<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav flex-column justify-content-between">
      <div class="top-links">
        <li class="nav-item">
          <a class="nav-link d-flex" aria-current="page" href="index.php">
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
          <a class="nav-link d-flex" href="shop.php">
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
          <a class="nav-link d-flex" href="contacts.php">
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
          <a class="nav-link d-flex" href="cart.php">
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
          <a class="nav-link d-flex" href="#">
            <i class="fi fi-rr-user"></i>
          </a>
        </li> 
      </div>
    </ul>
  </nav>
</div>