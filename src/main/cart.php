<?php 
session_start();
if(!isset($_SESSION["custId"]) && !isset($_SESSION["adminId"])){
    header("location: login.php");
}
?>

<?php 
require "includes/functions.php";
include("includes/cart.inc.php") ;
?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAGS -->
<?php include("../head-tags.php")?>

<body>

    <!-- SIDEBAR -->
    <?php include("../sidebar.php")?>
    
    <!-- ADMIN MESSAGE -->
    <?php
        if(isset($_SESSION["adminId"])){
            ?>
                <main>
                    <div class="row" style="margin-top:10rem">
                        <div class="col text-center my-5">
                            <h1>Hello <?php echo $_SESSION["adminUser"]?>! 
                                <br>
                                <br> Please login using a 
                                <br> Customer account to proceed.
                            </h1>
                        </div>
                    </div>
                </main>
            <?php
        }
    ?>

    <!-- MAIN CONTENT -->
    <main class="cart-wrapper" 
        <?php
            if(isset($_SESSION["adminId"])){
            ?>
                style="display: none";
            <?php
            }
        ?>
    >     

        <div>
            <h1 class="cart-title">YOUR CART</h1>
            <div class="cart-none text-center py-5 my-5" style="<?php echo $empty_style?>">
                <h1 class="pt-5">Your cart is currently empty.</h1>
                <h2>Add items to your cart to see them here!</h2>
            </div>
            <div class="cart" style="<?php echo $full_style?>">
                <table class="cart-table">
                    <tr class="cart-table-title">
                        <td></td>
                        <td class="cart-table-item-name">ITEM NAME</td>
                        <td class="cart-table-item-qty">QUANTITY</td>
                        <td class="cart-table-item-price">SUBTOTAL</td>
                    </tr>
                    <?php
                        $sum = 0;
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){

                            $cart_id = $row["cart_id"];

                            // get product data
                            $prod_id = $row["prod_id"];
                            $product = new ProductController();
                            $img_thumb = $product->getRecordImgThumb($prod_id);
                            $result_p = $product->getRecord($prod_id);
                            while($row_p = $result_p->fetch(PDO::FETCH_ASSOC)){
                                $prod_name = $row_p["prod_name"];
                                $prod_price = $row_p["prod_price"];
                            }

                            // get stock data
                            $stock_id = $row["stock_id"];
                            $result_s = $product->getRecordStockFromID($stock_id);
                            while($row_s = $result_s->fetch(PDO::FETCH_ASSOC)){
                                $stock_size = $row_s["stock_size"];
                            }

                            // get item qty
                            $item_qty = $row["item_qty"];

                            // get total price
                            $sum += $prod_price;

                            ?>
                            <tr class="cart-table-item">
                                <td class="cart-item-img"><img src="../../images/uploads/<?php echo $img_thumb?>" alt="Product Thumbnail"></td>
                                <td class="cart-table-item-name">
                                    <a href="prod-desc.php?prod_id=<?php echo $prod_id?>">
                                    <?php echo $prod_name?> (<?php echo $stock_size?>)
                                    </a>
                                </td>
                                <td class="cart-table-item-qty d-flex">
                                    <a href="cart.php?dec_id=<?php echo $cart_id?>"><i class="fi fi-rr-minus-small"></i></a> 
                                    <p><?php echo $item_qty?></p>
                                    <a href="cart.php?inc_id=<?php echo $cart_id?>"><i class="fi fi-rr-plus-small"></i></a> 
                                </td>
                                <td class="cart-table-item-price"><?php echo $prod_price?> PHP</td>
                            </tr>
                            <?php
                        }
                    ?>
                    <tr>
                        <td colspan="4"><hr></td>
                    </tr>
                </table>
                <div class="below-rc">
                    <a href="checkout.php" class="btn-black">TO CHECKOUT ></a>
                    <div class="cart-total"><?php echo $sum?> PHP</div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php
        if (!isset($_SESSION["adminId"]))
            include("footer.php")
    ?>
    
</body>

</html>
