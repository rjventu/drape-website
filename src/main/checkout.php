<?php 
session_start();
if(!isset($_SESSION["custId"])){
    header("location: login.php");
}

require "includes/functions.php";
include("includes/mysqli.config.php");
include("includes/checkout.inc.php");
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
                        <input type="email" id="email" placeholder="Email address" name="email" class="form-control" value="<?php echo $_SESSION['custEmail']?>" required>
                    </div>
                    <div class="form-group">
                        <textarea id="other" name="other" placeholder="Anything else to add?" class="form-control" rows="5" maxlength="500"></textarea>
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
                                <td class="checkout-table-item-name col-6">PRODUCT</td>
                                <td class="checkout-table-item-qty col">QTY</td>
                                <td class="checkout-table-item-price col">SUBTOTAL</td>
                            </tr>
                            <?php 
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                                $subtotal = $row['prod_price'] * $row['item_qty'];
                                $totalPrice += $subtotal;
                            ?>
                            <tr class="checkout-table-item">
                                <td class="checkout-table-item-name col"><?php echo $row['prod_name']; ?> (<?php echo $row["stock_size"]?>)</td>
                                <td class="checkout-table-item-qty col"><?php echo $row['item_qty']; ?></td>
                                <td class="checkout-table-item-price col"><?php echo $subtotal; ?> PHP</td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="checkout-shipping">SHIPPING</td>
                                <td class="checkout-shipping-cost"><?php echo $shippingCost; ?> PHP</td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <tr>    
                                <td colspan="2" class="checkout-table-total">TOTAL</td>
                                <td class="checkout-table-total-price"><?php echo $totalPrice + $shippingCost?> PHP</td>
                            </tr>
                        </table>
                        <input type="number" form="checkoutForm" name="total" id="total" value="<?php echo $totalPrice + $shippingCost?>" hidden/>
                    </div>
                    <div class="check-below mt-5">
                        <button type="submit" form="checkoutForm" class="btn-black">PLACE ORDER ></button>
                    </div>
                    <!-- <div class="check-below m-0 mt-5 p-0 d-flex align-items-end justify-content-end">
                        <button type="submit" form="checkoutForm" class="btn-black">PLACE ORDER ></button>
                    </div> -->
                </div>
            </div>
        </section>
 
    </main>

    <!-- FOOTER -->
    <?php include("footer.php")?>
    
</body>

</html>