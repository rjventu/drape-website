<?php include("includes/admin-session.inc.php")?>

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
              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="alert('you clicked me')">
                  <div class="row">
                    <p class="col-2 mb-0">653</p>
                    <p class="col mb-0 ptb-username">AmishKapoor</p>
                    <p class="col-3 mb-0 text-end">EN-ROUTE</p>
                  </div>
                </div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-pencil"></i></a></div>
              </div>

              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="alert('you clicked me')">
                  <div class="row">
                    <p class="col-2 mb-0">313</p>
                    <p class="col mb-0 ptb-username">ReigleighHigginbottom</p>
                    <p class="col-3 mb-0 text-end">EN-ROUTE</p>
                  </div>
                </div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-pencil"></i></a></div>
              </div>

              <div class="row panel-table-body mb-4">
                <div class="col ptb-contents-wrapper" onclick="alert('you clicked me')">
                  <div class="row">
                    <p class="col-2 mb-0">51</p>
                    <p class="col mb-0 ptb-username">LuceaDeCortez</p>
                    <p class="col-3 mb-0 text-end">SHIPPING</p>
                  </div>
                </div>
                <div class="col-1 ptb-links"><a href="#"><i class="fi fi-rr-pencil"></i></a></div>
              </div>

            </div>
          </div>
        </section>
        
    </main>

</body>
</html>