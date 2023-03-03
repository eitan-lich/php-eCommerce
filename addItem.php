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
   <?php require "header.php"?>

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
                <label>Item UPC
                    <input type="text" name="item-upc">
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
                <label>Item UPC
                    <input type="text" name="item-upc">
                </label>
                <button class='add-cart-btn' id="add-btn">Remove</button>
            </form>
        </div>
    </div>
</body>

</html>