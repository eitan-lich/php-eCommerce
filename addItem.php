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
    <title>eCommerce shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
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
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input id="search-bar" type="text" name="item" placeholder="Search">
                    <button>
                        <svg aria-hidden="true" class="pre-nav-design-icon" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none">
                            <path stroke="currentColor" stroke-width="1.5" d="M13.962 16.296a6.716 6.716 0 01-3.462.954 6.728 6.728 0 01-4.773-1.977A6.728 6.728 0 013.75 10.5c0-1.864.755-3.551 1.977-4.773A6.728 6.728 0 0110.5 3.75c1.864 0 3.551.755 4.773 1.977A6.728 6.728 0 0117.25 10.5a6.726 6.726 0 01-.921 3.407c-.517.882-.434 1.988.289 2.711l3.853 3.853"></path>
                        </svg>
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="item-wrapper">
        <div class="item-container">
            <h1>Add an item</h1>
            <form action="addDB.php" method="POST" class="item-form">
                <label>Item name
                    <input type="text" name="item-name">
                </label>
                <label>Item price
                    <input type="text" name="item-price">
                </label>
                <label>Item manufacturer
                    <input type="text" name="item-manu">
                </label>
                <label>Item SKU
                    <input type="text" name="item-sku">
                </label>
                <label>Item image
                    <input type="text" name="item-image">
                </label>
                <label>Item description
                    <textarea name="item-desc"></textarea>
                </label>
                <button class='add-cart-btn' id="add-btn">Add</button>
            </form>
        </div>
        <div class="item-container">
            <h1>Remove an item</h1>
            <form action="removeDB.php" method="POST" class="item-form">
                <label>Item SKU
                    <input type="text" name="item-sku">
                </label>
                <button class='add-cart-btn' id="add-btn">Remove</button>
            </form>
        </div>
    </div>
</body>

</html>