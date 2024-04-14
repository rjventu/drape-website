<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar-admin.php")?>

    <!-- MAIN CONTENT -->
    <main class="admin-wrapper">
        
        <!-- HEADER -->
        <section class="user-info mb-5">
          <div class="row">
            <div class="col d-flex justify-content-between">
              <h1>aishaalhadi</h1>
              <a href="#" class="btn-black">CREATE NEW ADMIN ></a>
            </div>
          </div>
        </section>

        <!-- PANEL NAVIGATION -->
        <section class="panel-navigation mb-5">
          <div class="row">
            <div class="col">
              <a href="admin-inventory.php" class="btn-black-active me-5">INVENTORY ></a>
              <a href="admin-orders.php" class="btn-black">ORDERS ></a>
            </div>
          </div>
        </section>

        <!-- TABLE -->
        <section class="panel-table-wrapper">

          <!-- Search Bar -->
          <div class="row search-row">
            <div class="col d-flex justify-content-between align-items-center">
              <div class="search-bar">
                <form action="#" method="post" enctype="multipart/form-data">
                  <input type="text" name="search_item" placeholder="SEARCH/FILTER...">
                  <input type="submit" name="filter" value="">
                </form>
              </div>
              <a href="#" class="btn-black">ADD ITEM +</a>
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
                    <p class="col mb-0">Product name</p>
                    <p class="col-3 mb-0 text-end">Price</p>
                  </div>
                </div>
                <div class="col-1"></div>
                <div class="col-1"></div>
              </div>

              <!-- Table Body -->
              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="alert('you clicked me')">
                  <div class="row">
                    <p class="col-2 mb-0">1</p>
                    <p class="col mb-0">Two Minutes Hoodie</p>
                    <p class="col-3 mb-0 text-end">2000 PHP</p>
                  </div>
                </div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-pencil"></i></a></div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-cross"></i></a></div>
              </div>

              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="alert('you clicked me')">
                  <div class="row">
                    <p class="col-2 mb-0">2</p>
                    <p class="col mb-0">Black Big Balls Tee</p>
                    <p class="col-3 mb-0 text-end">750 PHP</p>
                  </div>
                </div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-pencil"></i></a></div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-cross"></i></a></div>
              </div>

              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="alert('you clicked me')">
                  <div class="row">
                    <p class="col-2 mb-0">3</p>
                    <p class="col mb-0">White Circle Lighthouse Tee</p>
                    <p class="col-3 mb-0 text-end">700 PHP</p>
                  </div>
                </div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-pencil"></i></a></div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-cross"></i></a></div>
              </div>

            </div>
          </div>
        </section>
        
    </main>

   
</body>

</html>
