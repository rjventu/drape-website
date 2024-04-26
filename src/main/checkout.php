<?php 

session_start();
if(!isset($_SESSION["custId"])){
    header("location: login.php");
}

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "drape";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$custId = $_SESSION["custId"];
$sql = "SELECT ci.*, p.prod_name, p.prod_price FROM cart_item ci
        INNER JOIN product p ON ci.prod_id = p.prod_id
        WHERE ci.cust_id = $custId";
$result = mysqli_query($conn, $sql);

$totalPrice = 0;
$shippingCost = 60;

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
                    <div class="check-below m-0 mt-3 p-0 d-flex justify-content-start">
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
                            <?php 
                            while($row = mysqli_fetch_assoc($result)) {
                                $subtotal = $row['prod_price'] * $row['item_qty'];
                                $totalPrice += $subtotal;
                            ?>
                            <tr class="checkout-table-item">
                                <td class="checkout-table-item-name"><?php echo $row['prod_name']; ?></td>
                                <td class="checkout-table-item-qty"><?php echo $row['item_qty']; ?></td>
                                <td class="checkout-table-item-price"><?php echo $subtotal; ?> PHP</td>
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
                                <td class="checkout-table-total-price"><?php echo $totalPrice + $shippingCost; ?> PHP</td>
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