<?php session_start();?>

<?php
include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

$product = new ProductController();
$result = $product->getTable();
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
        <section class="shop-hero">
            <div class="shop-hero-content">
                <h1 class="shop-hero-text">CHECK OUT OUR SHOP!</h1>
                <div class="shop-hero-links">
                    <a href="shop-category-shirts.php" class="btn-shop-hero">SHIRTS</a>
                    <a href="shop-category-hoodies.php" class="btn-shop-hero">HOODIES</a>
                    <a href="shop-category-acc.php" class="btn-shop-hero">ACCESSORIES</a> 
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
