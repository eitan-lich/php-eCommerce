<?php session_start();
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

if (isset($_SESSION['cart'], $_POST['item_id'])) {
    $item_to_remove = $_POST['item_id'];
    unset($_SESSION['cart'][array_search($item_to_remove, $_SESSION['cart'])]);
} ?>

    <?php require "header.php"?>
    <body>
    <main id='cart-main'>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cart_array = $_SESSION["cart"];
            foreach ($cart_array as $item_id) {
                $statement = "SELECT * FROM items WHERE ID = '$item_id'";
                $query_result = mysqli_query($con, $statement);
                $row = mysqli_fetch_assoc($query_result);
                echo "
                <div class='cart-container'> 
                        <input type='hidden' name='item_id' value='.$row[ID]'>
                        <img src='$row[item_image]'>
                        <h1>$row[item_name]</h1>
                        <h2>$$row[item_price]</h2>
                        <button class='remove-btn'>&#10005; Remove</button>
                </div>";
            }

            echo "
                <div class='checkout'>
                    <form action='checkout.php' method='post'>
                        <button class='checkout-btn'>Continue to checkout</button>
                    </form>
                </div>
                
                <div class='clear-cart'>
                    <form action='clearCart.php' method='post'>
                        <button class='clear-cart-btn'>Clear cart</button>
                    </form>
                </div>";
        }
        ?>
    </main>
    <script src="js/script.js"></script>
    </body>

</html>