<?php include("includes/admin-session.inc.php")?>

<?php include("includes/admin-product-add.inc.php"); ?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<head> 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar.php")?>

    <!-- MAIN CONTENT -->
    <main>

      <section class="view-order-back">
        <button type="button" class="btn-black" onclick="window.location.href = 'admin-inventory.php';">< BACK</button>
      </section>

      <!-- ORDER INFO -->
      <section class="product-form-wrapper mt-5">
        <div class="row text-center mb-5">
          <h1><strong>ADD A NEW PRODUCT</strong></h1>
        </div>

        <div class="row status-messages mb-5 d-flex">
          <?php  
            if(!empty($success_msg)){ 
            ?> 
              <span class="alert alert-success w-25 text-center"><?php echo $success_msg; ?></span> 
            <?php  
            }
            if (!empty($error_msg)){
            ?> 
            <span class="alert alert-danger w-25 text-center"><?php echo $error_msg; ?></span> 
            <?php  
            }
          ?>
        </div>
        
        <form class="row" action="admin-product-add.php" method="post" enctype="multipart/form-data" name="add-product-form" id="add-product-form">

          <!-- Left Side -->
          <div class="col-6 product-form-left d-flex flex-column justify-content-between px-5">
            <div class="form-group">
              <div class="form-group-label d-flex justify-content-between">
                <h5>PRODUCT NAME AND COLOR</h5>
                <h6><i>required</i></h6>
              </div>
              <input type="text" name="prod_name" id="prod_name" class="form-control" placeholder="Graphic Tee - WHITE" required>
            </div>
            <div class="form-group mt-3">
              <div class="form-group-label d-flex justify-content-between">
                <h5>PRICE (IN PHP)</h5>
                <h6><i>required</i></h6>
              </div>
              <input type="number" name="prod_price" id="prod_price" class="form-control" placeholder="550.00" min="0" step="0.01" required>
            </div>
            <div class="form-group mt-3">
              <div class="form-group-label d-flex justify-content-between">
                <h5>CATEGORY</h5>
                <h6><i>required</i></h6>
              </div>
              <select name="cat_name" id="cat_name" class="form-select" required>
                <!-- <option selected>Select a category</option> -->
                <option value="Shirts" selected>Shirts</option>
                <option value="Hoodies">Hoodies</option>
                <option value="Accessories">Accessories</option>
              </select>
            </div>
            <div class="form-group mt-3">
              <div class="form-group-label d-flex justify-content-between">
                <h5>DESCRIPTION</h5>
              </div>
              <textarea name="prod_description" id="prod_description" class="form-control" placeholder="Max 500 characters" rows="3" maxlength="500"></textarea>
            </div>
          </div>

          <!-- Right Side -->
          <div class="col product-form-right d-flex flex-column px-5">
            <div class="form-group">
              <div class="form-group-label d-flex justify-content-between">
                <h5>SIZES</h5>
                <h6><i>required</i></h6>
              </div>
              <div class="row pform-sizes-wrapper">
                <div class="col">
                  <div class="pform-sizes d-flex">
                    <h3>XS:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="0" min="0" step="0" required>
                  </div>
                  <div class="pform-sizes d-flex">
                    <h3>S:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="0" min="0" step="0" required>
                  </div>
                  <div class="pform-sizes d-flex">
                    <h3>M:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="0" min="0" step="0" required>
                  </div>
                </div>
                <div class="col ps-5">
                  <div class="pform-sizes d-flex">
                    <h3>L:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="0" min="0" step="0" required>
                  </div>
                  <div class="pform-sizes d-flex">
                    <h3>XL:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="0" min="0" step="0" required>
                  </div>
                  <div class="pform-sizes d-flex">
                    <h3>XXL:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="0" min="0" step="0" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group mt-5">
              <div class="form-group-label d-flex justify-content-between">
                <h5>IMAGE (MAX 4)</h5>
                <h6><i>required</i></h6>
              </div>
              <div class="input-images"></div>
            </div>
          </div>
          <div class="row d-flex justify-content-end pe-5 mt-5">
            <button type="submit" name="submit" id="submit" class="btn-black" style="width:fit-content">ADD PRODUCT ></button>
          </div>
        </form>
      </section>
        
    </main>

</body>

<script type="text/javascript" src="../../plugins/drag-drop/dist/image-uploader.min.js"></script>

<script>
  let preloaded = [];

  $('.input-images').imageUploader({
    preloaded: preloaded,
    imagesInputName: 'photos',
    preloadedInputName: 'photos',
    maxSize: 2 * 1024 * 1024,
    maxFiles: 4
  });  
</script>

</html>