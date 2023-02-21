<?php
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);




if (isset(
    $_POST['item-upc'],
)) {
    $item_upc = $_POST['item-upc'];
    $query = "DELETE  FROM items WHERE item_upc = '$item_upc'";
    mysqli_query($con, $query);
    header("Location:index.php");
}
