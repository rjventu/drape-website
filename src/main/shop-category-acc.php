<?php session_start();?>

<?php
include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

$product = new ProductController();
$result = $product->getTableCat("Accessories");
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
        
        <!-- HERO BANNER -->
        <section class="hero-shop-cat">
            <div class="hero-shop-cat-content">
                <div class="hero-text">
                    <h1>ACCESSORIES</h1>
                    <p>Check out our accessories to match your style!</p>
                </div>
                <div class="hero-link">
                    <a href="shop.php" class="btn-hero">V</a>
                </div>
            </div>
        </section>

        <!-- FEATURED ITEMS -->
        <section class="featured">
            <div class="featured-select">
                <?php
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $img_thumb = $product->getRecordImgThumb($row["prod_id"]);
                    echo "
                    <div class='featured-item'>
                        <img src='../../images/uploads/".$img_thumb."' alt='".$row["prod_name"]." Thumbnail'>
                        <div class='item-overlay'>
                            <div class='item-desc'>
                                <h3>".$row["prod_price"]." PHP</h3>
                                <h2>".$row["prod_name"]."</h2>
                            </div>
                            <div class='item-link'>
                                <a href='prod-desc.php?prod_id=".$row["prod_id"]."' class='btn-gallery'>></a>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>
