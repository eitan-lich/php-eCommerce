<?php
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);




if (isset(
    $_POST['item-name'],
    $_POST['item-price'],
    $_POST['item-manu'],
    $_POST['item-sku'],
    $_POST['item-image'],
    $_POST['item-desc']
)) {
    $item_name = $_POST['item-name'];
    $item_price = $_POST['item-price'];
    $item_manu = $_POST['item-manu'];
    $item_sku = $_POST['item-sku'];
    $item_image = $_POST['item-image'];
    $item_desc = $_POST['item-desc'];
    $query = "INSERT INTO items(ID, item_name, item_price,item_manufacturer,item_sku,item_image,item_description) VALUES(null,'$item_name','$item_price',
    '$item_manu','$item_sku','$item_image','$item_desc')";
    mysqli_query($con, $query);
    header("Location:index.php");
}
