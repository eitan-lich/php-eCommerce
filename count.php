<?php session_start();

$cart_json = array("count"=>count($_SESSION['cart']));

echo json_encode($cart_json);


?>