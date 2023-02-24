<?php 
require_once("C:/xampp/htdocs/www/php-website/database.php");
require_once("C:/xampp/htdocs/www/php-website/model/product_model.php");



class Product {

    public function allItems() {
        $products = product_model::getAllItems();
        require_once("C:/xampp/htdocs/www/php-website/view/index.php");
    }

    


}

$p = new Product();
$p->allItems();

?>