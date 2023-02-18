<?php
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
    <h1>Add an item</h1>
    <form action="addDB.php" method="POST">
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
        <button>Add</button>
    </form>
</body>

</html>