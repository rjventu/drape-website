<?php session_start();?>

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
                    <h1>SHIRTS</h1>
                    <p>The best tees with killer design</p>
                </div>
                <div class="hero-link">
                    <a href="shop.php" class="btn-hero">V</a>
                </div>
            </div>
        </section>

        <!-- FEATURED ITEMS -->
        <section class="featured">
            <div class="featured-select">
                <div class="featured-item">
                    <img src="../../images/sincerely-media-9ShY-Tq70Mc-unsplash.jpg" alt="Item 1">
                    <div class="item-overlay">
                        <div class="item-desc">
                            <h3>750PHP</h3>
                            <h2>LOOK ON WITH ENVY AND HATE</h2>
                        </div>
                        <div class="item-link">
                            <a href="prod-desc.php?prod_id=5" class="btn-gallery">></a>
                        </div>
                    </div>
                </div>
                <div class="featured-item">
                    <img src="../../images/bao-bao-mlKE8dEMc_8-unsplash.jpg" alt="Item 2">
                    <div class="item-overlay">
                        <div class="item-desc">
                            <h3>800PHP</h3>
                            <h2>LIET-KYNES</h2>
                        </div>
                        <div class="item-link">
                            <a href="prod-desc.php?prod_id=6" class="btn-gallery">></a>
                        </div>
                    </div>
                </div>
                <div class="featured-item">
                    <img src="../../images/faith-yarn-jX2cntCbrAo-unsplash.jpg" alt="Item 3">
                    <div class="item-overlay">
                        <div class="item-desc">
                            <h3>10000PHP</h3>
                            <h2>PERDOT SHIRT NEE ARAK</h2>
                        </div>
                        <div class="item-link">
                            <a href="prod-desc.php?prod_id=7" class="btn-gallery">></a>
                        </div>
                    </div>
                </div>
                <div class="featured-item">
                    <img src="../../images/don-delfin-almonte-ebTNU_YTWgc-unsplash.jpg" alt="Item 4">
                    <div class="item-overlay">
                        <div class="item-desc">
                            <h3>1200PHP</h3>
                            <h2>THE SAND WORM, GOD OF SAND</h2>
                        </div>
                        <div class="item-link">
                            <a href="prod-desc.php?prod_id=8" class="btn-gallery">></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>
