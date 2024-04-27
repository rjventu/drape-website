<?php session_start();?>

<?php
include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

$product = new ProductController();
$result = $product->getTableFeatured();
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
        <section class="hero">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>DRAPE</h1>
                    <p>We've got the lastest trends!</p>
                </div>
                <div class="hero-link">
                    <a href="shop.php" class="btn-hero">SHOP ></a>
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
        
        <!-- ABOUT DRAPE SECTION -->
        <section class="about">
            <h1 class="about-title">ASPIRE TO INSPIRE</h1>
            <p>
            Welcome to Drape, your go-to destination for all things fashion! At Drape, we believe in the power of style to inspire and empower individuals. Our curated collection features the latest trends in clothing, accessories, and more, carefully selected to reflect your unique personality and lifestyle. With the latest trends and a seamless shopping experience, Drape is here to help you express yourself through fashion effortlessly. Join us and discover a world of style possibilities!
            </p>
        </section>

    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>
