<?php session_start();
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

if (isset($_SESSION['cart'], $_POST['item_id'])) {
    $item_to_remove = $_POST['item_id'];
    unset($_SESSION['cart'][array_search($item_to_remove, $_SESSION['cart'])]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My cart</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php require "header.php"?>
    <main id='cart-main'>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cart_array = $_SESSION["cart"];
            foreach ($cart_array as $item_id) {
                $item_id = substr($item_id, 1);
                $statement = "SELECT * FROM items WHERE ID = '$item_id'";
                $query_result = mysqli_query($con, $statement);
                $row = mysqli_fetch_assoc($query_result);
                echo "
                <div class='cart-container'>
                    <form action='' method='post'>   
                        <input type='hidden' name='item_id' value='.$row[ID]'>
                        <img src='$row[item_image]'>
                        <h1>$row[item_name]</h1>
                        <h2>$$row[item_price]</h2>
                        <button>&#10005; Remove</button>
                    </form>
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
</body>

</html>