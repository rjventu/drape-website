<?php session_start();?>

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
                                <img class="d-block w-100" src="../../images/giacomo-lucarini--pOMjxrXBIY-unsplash.jpg" alt="Main image">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../../images/bao-bao-mlKE8dEMc_8-unsplash.jpg" alt="Second image">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../../images/don-delfin-almonte-ebTNU_YTWgc-unsplash.jpg" alt="Third image">
                            </div>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.</p>
                </div>
            </div>
            <!-- PROD INFO + CART -->
            <div class="prod-right">
                <div class="prod-info-text">
                    <h1 class="prod-title">OKAY, BOOMER TEE</h1>
                    <h3 class="prod-price">400PHP</h3>
                </div>
                <div class="prod-size-sel">
                    <h3 class="prod-size-header">SIZE</h3>
                    <div class="prod-size-options">
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
                    </div>
                </div>
                <a href="#" class="btn-black">ADD TO CART ></a>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>
