<?php 

session_start();
if(!isset($_SESSION["custId"])){
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar.php")?>

    <!-- MAIN CONTENT -->
    <main class="main-checkout">

        <section class="checkout-form-wrapper">
            <h1 class="checkout-form-title">CHECKOUT</h1>
            <div>
                <form id="checkoutForm" class="checkout-form-fields" action="checkout-form.php" method="post" onsubmit="return showOrderPlacedMessage();">
                    <div class="form-flnames">
                        <div class="form-group">
                            <input type="text" id="first-name" placeholder="First name" name="first-name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="last-name" placeholder="Last name" name="last-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" id="Address" placeholder="Address" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="region" placeholder="Region" name="region" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="zip-code" placeholder="ZIP code" name="zip-code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone" placeholder="Phone number" name="phone" class="form-control" required pattern="[0-9]{11}">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" placeholder="Email address" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <textarea id="other" name="other" placeholder="Anything else to add?" class="form-control" rows="5" maxlength="500"></textarea>
                    </div>
                    <div class="check-below">
                        <button type="submit" class="btn-black">PLACE ORDER ></button>
                    </div>
                </form>                    
            </div>
        </section>

        <script>
        function showOrderPlacedMessage() {
        var form = document.getElementById('checkoutForm');

        if (form.checkValidity()) {
            alert("The order has been placed. Thank you for shopping!");
        return true;
            } else {
            return false;
            }
        }
        </script>
        
        <section class="checkout-receipt">
            <div class="checkout-wrapper">
                <div class="checkout-wrapper-inside" >
                    <div class="checkout">
                        <table class="checkout-table">
                            <tr class="checkout-table-title">
                                <td class="checkout-table-item-name">PRODUCT</td>
                                <td class="checkout-table-item-qty">QTY</td>
                                <td class="checkout-table-item-price">SUBTOTAL</td>
                            </tr>
                            <tr class="checkout-table-item">
                                <td class="checkout-table-item-name">WHITE VOGUE TEE</td>
                                <td class="checkout-table-item-qty">1</td>
                                <td class="checkout-table-item-price">1000PHP</td>
                            </tr>
                            <tr class="checkout-table-item">
                                <td class="checkout-table-item-name">BLACK EARTH MARA TEE</td>
                                <td class="checkout-table-item-qty">1</td>
                                <td class="checkout-table-item-price">650PHP</td>
                            </tr>
                            <tr class="checkout-table-item">
                                <td class="checkout-table-item-name">LIGHT GREEN FROGUN TEE</td>
                                <td class="checkout-table-item-qty">99</td>
                                <td class="checkout-table-item-price">2000000PHP</td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <tr>
                                <td class="checkout-shipping">SHIPPING</td>
                                <td></td>
                                <td class="checkout-shipping-cost">5000PHP</td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <tr>    
                                <td class="checkout-table-total">TOTAL</td>
                                <td></td>
                                <td class="checkout-table-total-price">2006650PHP</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
            
    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>