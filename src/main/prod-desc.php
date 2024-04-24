<?php session_start();?>

<?php include("includes/prod-desc.inc.php")?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar.php")?>

    <!-- MAIN CONTENT -->
    <main class="prod-main">
        
        <div class="prod-wrapper">
            <!-- IMAGE + DESC -->
            <div class="prod-left">
                <div class="prod-img">
                    <div id="prodCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../../images/uploads/<?php echo $prod_image?>" alt="<?php echo $prod_name?> image">
                            </div>
                            <?php
                            foreach($img_array as $img){
                                echo "
                                <div class='carousel-item'>
                                    <img class='d-block w-100' src='../../images/uploads/".$img."' alt='<?php echo $prod_name?> image'>
                                </div>
                                ";
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#prodCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#prodCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="prod-desc-text">
                    <p><?php echo $prod_description; ?></p>
                </div>
            </div>
            <!-- PROD INFO + CART -->
            <div class="prod-right">
                <div class="prod-info-text">
                    <h1 class="prod-title"><?php echo $prod_name; ?></h1>
                    <h3 class="prod-price"><?php echo $prod_price; ?></h3>
                </div>
                <div class="prod-size-sel">
                    <h3 class="prod-size-header">SIZE</h3>
                    <div class="prod-size-options">
                        <label for="size-xs" class="size-option">
                            <input type="radio" id="size-xs" name="size" value="S">
                            <span>XS</span>
                        </label>
                        <label for="size-s" class="size-option">
                            <input type="radio" id="size-s" name="size" value="S">
                            <span>S</span>
                        </label>
                        <label for="size-m" class="size-option">
                            <input type="radio" id="size-m" name="size" value="M">
                            <span>M</span>
                        </label>
                        <label for="size-l" class="size-option">
                            <input type="radio" id="size-l" name="size" value="L">
                            <span>L</span>
                        </label>
                        <label for="size-xl" class="size-option">
                            <input type="radio" id="size-xl" name="size" value="L">
                            <span>XL</span>
                        </label>
                        <label for="size-xxl" class="size-option">
                            <input type="radio" id="size-xxl" name="size" value="L">
                            <span>XXL</span>
                        </label>
                    </div>
                </div>
                <a href="cart.php" class="btn-black">ADD TO CART ></a>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>
