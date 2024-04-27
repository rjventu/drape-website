<?php 
session_start();
if(!isset($_SESSION["custId"]) && !isset($_SESSION["adminId"])){
    header("location: login.php");
}

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
                <h1 class="pt-5">Your cart is empty.</h1>
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
                        $result = $cart->getTable();
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){

                            $cart_id = $row["cart_id"];
                            $prod_id = $row["prod_id"];
                            $prod_name = $row["prod_name"];
                            $prod_price = $row["prod_price"];
                            $stock_size = $row["stock_size"];
                            $item_qty = $row["item_qty"];
                            
                            $product = new ProductController();
                            $img_thumb = $product->getRecordImgThumb($prod_id);
                            
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
