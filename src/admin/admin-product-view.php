<?php include("includes/admin-session.inc.php")?>

<?php include("includes/admin-product-view.inc.php")?>

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
          <h1><strong>PRODUCT # <?php echo $prod_id?></strong></h1>
        </div>
        
        <form class="row" action="#" method="post" enctype="multipart/form-data" name="add-product-form" id="add-product-form">

          <!-- Left Side -->
          <div class="col-6 product-form-left d-flex flex-column justify-content-between px-5">
            <div class="form-group">
              <div class="form-group-label d-flex justify-content-between">
                <h5>PRODUCT NAME AND COLOR</h5>
              </div>
              <input type="text" name="prod_name" id="prod_name" class="form-control" value="<?php echo $prod_name?>" disabled>
            </div>
            <div class="form-group mt-3">
              <div class="form-group-label d-flex justify-content-between">
                <h5>PRICE (IN PHP)</h5>
              </div>
              <input type="number" name="prod_price" id="prod_price" class="form-control" value="<?php echo $prod_price?>" min="0" step="0.01" disabled>
            </div>
            <div class="form-group mt-3">
              <div class="form-group-label d-flex justify-content-between">
                <h5>CATEGORY</h5>
              </div>
              <select name="cat_name" id="cat_name" class="form-select" disabled>
                <option value="Shirts"<?=$cat_name == 'Shirts' ? ' selected="selected"' : '';?>>Shirts</option>
                <option value="Hoodies"<?=$cat_name == 'Hoodies' ? ' selected="selected"' : '';?>>Hoodies</option>
                <option value="Accessories"<?=$cat_name == 'Accessories' ? ' selected="selected"' : '';?>>Accessories</option>
              </select>
            </div>
            <div class="form-group mt-3">
              <div class="form-group-label d-flex justify-content-between">
                <h5>DESCRIPTION</h5>
              </div>
              <textarea name="prod_description" id="prod_description" class="form-control" rows="3" maxlength="500" disabled><?php echo $prod_description?></textarea>
            </div>
          </div>

          <!-- Right Side -->
          <div class="col product-form-right d-flex flex-column px-5">
            <div class="form-group">
              <div class="form-group-label d-flex justify-content-between">
                <h5>SIZES</h5>
              </div>
              <div class="row pform-sizes-wrapper">
                <div class="col">
                  <div class="pform-sizes d-flex">
                    <h3>XS:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="<?php echo $stock_array[0]?>" min="0" step="0" disabled>
                  </div>
                  <div class="pform-sizes d-flex">
                    <h3>S:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="<?php echo $stock_array[1]?>" min="0" step="0" disabled>
                  </div>
                  <div class="pform-sizes d-flex">
                    <h3>M:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="<?php echo $stock_array[2]?>" min="0" step="0" disabled>
                  </div>
                </div>
                <div class="col ps-5">
                  <div class="pform-sizes d-flex">
                    <h3>L:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="<?php echo $stock_array[3]?>" min="0" step="0" disabled>
                  </div>
                  <div class="pform-sizes d-flex">
                    <h3>XL:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="<?php echo $stock_array[4]?>" min="0" step="0" disabled>
                  </div>
                  <div class="pform-sizes d-flex">
                    <h3>XXL:</h3>
                    <input type="number" name="stock[]" id="stock" class="form-control" value="<?php echo $stock_array[5]?>" min="0" step="0" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group mt-5">
              <div class="form-group-label d-flex justify-content-between">
                <h5>IMAGE (MAX 4)</h5>
              </div>
              <div class="input-images"></div>
            </div>
          </div>
        </form>
      </section>
        
    </main>

</body>

<script type="text/javascript" src="../../plugins/drag-drop/dist/image-uploader.min.js"></script>

<script>
  let preloaded = [];

  let img_array = <?php echo json_encode($img_array); ?>;

  img_array.forEach(pushToPreloaded);

  function pushToPreloaded(item, index){
    preloaded.push(
      {
        id: index,
        src: item
      }
    )
  }

  $('.input-images').imageUploader({
    preloaded: preloaded,
    imagesInputName: 'photos',
    preloadedInputName: 'old',
    maxSize: 100 * 1024 * 1024,
    maxFiles: 4
  });  

</script>

</html>