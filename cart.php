<?php session_start();
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);


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
    <nav>
        <ul class="navbar">
            <li class="navbar-item"><a href="index.php">Home</a></li>
            <li class="navbar-item"><a href="about.php">About</a></li>
            <li class="navbar-item">
                <?php
                if (isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true) {
                    echo "<a href='logout.php'>Logout</a></li>
                    <li class='navbar-item'><a href='addItem.php'>Add or remove an item</a></li>
                    <li class='navbar-item'><a href='#'>Welcome back <span style='text-decoration:underline;'>" . $_SESSION['name'] . "</span></a></li>";
                } else {
                    echo "<a href='login.php'>Login/Register</a></li>
                    <li class='navbar-item'><a href='#'>Welcome back <span style='text-decoration:underline;'>Guest</span></li></a>";
                } ?>

            <li>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
                    <div class="wrapper-search">
                        <input id="search-bar" type="text" name="item" placeholder="Search">
                        <button id="search-button">
                            <svg aria-hidden="true" class="pre-nav-design-icon" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none" style="display:inline;">
                                <path stroke="currentColor" stroke-width="1.5" d="M13.962 16.296a6.716 6.716 0 01-3.462.954 6.728 6.728 0 01-4.773-1.977A6.728 6.728 0 013.75 10.5c0-1.864.755-3.551 1.977-4.773A6.728 6.728 0 0110.5 3.75c1.864 0 3.551.755 4.773 1.977A6.728 6.728 0 0117.25 10.5a6.726 6.726 0 01-.921 3.407c-.517.882-.434 1.988.289 2.711l3.853 3.853"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </li>
            <li class="navbar-item"><a href=""><img src="https://www.allphptricks.com/demo/2018/july/simple-shopping-cart-php/cart-icon.png"><?php echo count($_SESSION['cart']) ?></a></li>
        </ul>
    </nav>
    <main>
        <?php
             if (!empty($_SESSION['cart'])) {
                $cart_array = $_SESSION["cart"];
                foreach($cart_array as $item_id) {
                    $item_id = substr($item_id, 1);
                    $statement = "SELECT * FROM items WHERE ID = '$item_id'";
                    $query_result = mysqli_query($con, $statement);
                    $row = mysqli_fetch_assoc($query_result);
                    echo "<form action='' method='post'>
                    <div class='cart-container'>
                    <input type='hidden' name='item_id' value='.$row[ID]'>
                        <img src='$row[item_image]'>
                        <h1>$row[item_name]</h1>
                        <h2>$$row[item_price]</h2>
                        <h2>$row[item_manufacturer]</h2>
                        <p>UPC - $row[item_upc]</p>
                        <button type='button' class='see-more-btn'>Remove</button>
                        </div>
                        </form>";
                }
            }
        ?>
    </main>
</body>
</html>