<?php


class product_model {
    public $id;
    public $item_name;
    public $item_price;
    public $item_manufacturer;
    public $item_upc;
    public $item_image;
    public $item_description;


    public function __construct($id, $item_name, $item_price, $item_manufacturer, $item_upc, $item_image, $item_description) {
        $this->id = $id;
        $this->item_name = $item_name;
        $this->$item_price = $item_price;
        $this->item_manufacturer = $item_manufacturer;
        $this->item_upc = $item_upc;
        $this->item_image = $item_image;
        $this->item_description = $item_description;
    }


    public static function getItem($item_name){
        $list = [];
        $db = Db::getInstance();
        if($result = mysqli_query($db, "SELECT * FROM items where item_name LIKE %$item_name%")) {
            if($row = mysqli_fetch_assoc($result)){
                $list = new product_model($row['ID'],$row['item_name'],$row['item_price'],$row['item_manufacturer'],$row['item_upc']
                ,$row['item_image'],$row['item_description']);
            }
        }

        return $list;
    }


    public static function getAllItems() {
        $list = [];
        $db = Db::getInstance();
        $result = mysqli_query($db,'SELECT * FROM items');

        while($row = mysqli_fetch_assoc($result)){
            $list[] = new product_model($row['ID'],$row['item_name'],$row['item_price'],$row['item_manufacturer'],$row['item_upc']
            ,$row['item_image'],$row['item_description']);
        }
        return $list;
    }
}
































?>