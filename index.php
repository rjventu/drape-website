<?php session_start();?>

<?php
include("src/classes/Database.class.php");
include("src/classes/Product.class.php");
include("src/classes/ProductCon.class.php");

$product = new ProductController();
$result = $product->getTableFeatured();
?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("src/head-tags-index.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("src/sidebar-index.php")?>

    <!-- MAIN CONTENT -->
    <main>
        
        <!-- HERO BANNER -->
        <section class="hero">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>DRAPE</h1>
                    <p>We've got the lastest trends!</p>
                </div>
                <div class="hero-link">
                    <a href="src/main/shop.php" class="btn-hero">SHOP ></a>
                </div>
            </div>
        </section>

        <!-- FEATURED ITEMS -->
        <section class="featured">
            <h2 class="featured-title">Check out our top sellers!</h2>
            <div class="featured-select">
                <?php
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $img_thumb = $product->getRecordImgThumb($row["prod_id"]);
                    echo "
                    <div class='featured-item'>
                        <img src='images/uploads/".$img_thumb."' alt='".$row["prod_name"]." Thumbnail'>
                        <div class='item-overlay'>
                            <div class='item-desc'>
                                <h3>".$row["prod_price"]." PHP</h3>
                                <h2>".$row["prod_name"]."</h2>
                            </div>
                            <div class='item-link'>
                                <a href='src/main/prod-desc.php?prod_id=".$row["prod_id"]."' class='btn-gallery'>></a>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>
        </section>
        
        <!-- ABOUT DRAPE SECTION -->
        <section class="about">
            <h1 class="about-title">ASPIRE TO INSPIRE</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mollis, orci sed fermentum lacinia, metus nunc eleifend metus, ut tempus mauris tortor vel lectus. Curabitur pretium metus ipsum. Nunc id vulputate elit. Nulla dolor nibh, feugiat sit amet leo eu, vestibulum ultrices felis. Praesent in leo sapien. Nullam id mauris tincidunt, lacinia metus sit amet, aliquet nisl. Praesent et mauris eget metus placerat dapibus tincidunt eu libero. Vivamus finibus a nulla eget vulputate. Praesent in scelerisque metus.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mollis, orci sed fermentum lacinia, metus nunc eleifend metus, ut tempus mauris tortor vel lectus. Curabitur pretium metus ipsum. Nunc id vulputate elit. Nulla dolor nibh, feugiat sit amet leo eu, vestibulum ultrices felis. Praesent in leo sapien. Nullam id mauris tincidunt, lacinia metus sit amet, aliquet nisl. Praesent et mauris eget metus placerat dapibus tincidunt eu libero. Vivamus finibus a nulla eget vulputate. Praesent in scelerisque metus.
            </p>
        </section>

    </main>

    <!-- FOOTER -->
    <?php include("src/main/footer.php")?>
    
</body>

</html>
