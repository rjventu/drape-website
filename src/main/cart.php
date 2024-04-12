<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar.php")?>

    <!-- MAIN CONTENT -->
    <main class="cart-wrapper">
        <div>
            <h1 class="cart-title">YOUR CART</h1>
            <div class="cart">
                <table class="cart-table">
                    <tr class="cart-table-title">
                        <td></td>
                        <td class="cart-table-item-name">ITEM NAME</td>
                        <td class="cart-table-item-qty">QUANTITY</td>
                        <td class="cart-table-item-price">PRICE</td>
                    </tr>
                    <tr class="cart-table-item">
                        <td class="cart-item-img"><img src="../../images/bao-bao-mlKE8dEMc_8-unsplash.jpg" alt=""></td>
                        <td class="cart-table-item-name">WHITE VOGUE TEE</td>
                        <td class="cart-table-item-qty">1</td>
                        <td class="cart-table-item-price">1000PHP</td>
                    </tr>
                    <tr class="cart-table-item">
                        <td class="cart-item-img"><img src="../../images/don-delfin-almonte-ebTNU_YTWgc-unsplash.jpg" alt=""></td>
                        <td class="cart-table-item-name">BLACK EARTH MARA TEE</td>
                        <td class="cart-table-item-qty">1</td>
                        <td class="cart-table-item-price">650PHP</td>
                    </tr>
                    <tr class="cart-table-item">
                        <td class="cart-item-img"><img src="../../images/faith-yarn-jX2cntCbrAo-unsplash.jpg" alt=""></td>
                        <td class="cart-table-item-name">LIGHT GREEN FROGUN TEE</td>
                        <td class="cart-table-item-qty">99</td>
                        <td class="cart-table-item-price">2000000PHP</td>
                    </tr>
                    <tr>
                        <td colspan="4"><hr></td>
                    </tr>
                </table>
                <div class="below-rc">
                    <a href="checkout.php" class="btn-black">TO CHECKOUT ></a>
                    <div class="cart-total">2001650PHP</div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>
