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
                <div class="featured-item">
                    <img src="../../images/sincerely-media-9ShY-Tq70Mc-unsplash.jpg" alt="Item 1">
                    <div class="item-overlay">
                        <div class="item-desc">
                            <h3>750PHP</h3>
                            <h2>LOOK ON WITH ENVY AND HATE</h2>
                        </div>
                        <div class="item-link">
                            <a href="prod-desc.php" class="btn-gallery">></a>
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
                            <a href="prod-desc.php" class="btn-gallery">></a>
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
                            <a href="prod-desc.php" class="btn-gallery">></a>
                        </div>
                    </div>
                </div>
                <div class="featured-item">
                    <img src="../../images/don-delfin-almonte-ebTNU_YTWgc-unsplash.jpg" alt="Item 4">
                    <div class="item-overlay">
                        <div class="item-desc">
                            <h3>*1200PHP</h3>
                            <h2>THE SAND WORM, GOD OF SAND</h2>
                        </div>
                        <div class="item-link">
                            <a href="prod-desc.php" class="btn-gallery">></a>
                        </div>
                    </div>
                </div>
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
    <?php include("footer.php")?>
    
</body>

</html>
