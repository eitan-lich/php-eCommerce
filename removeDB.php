<?php
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);




if (isset(
    $_POST['item-sku'],
)) {
    $item_sku = $_POST['item-sku'];
    $query = "DELETE  FROM items WHERE item_sku = '$item_sku'";
    mysqli_query($con, $query);
    header("Location:index.php");
}
