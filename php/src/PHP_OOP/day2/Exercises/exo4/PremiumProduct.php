<?php

require_once "Product.php";
require_once "IDiscountable.php";

class PremiumProduct extends Product implements IDiscountable{
    public $pPrice;

    public function __construct($pPrice, $description){
        $this->pPrice = $pPrice;
        parent::__construct($description);
    }

    public function getPrice(){
        echo $this->pPrice ." <br>";
    }

    public function getDescription(){
        echo $this->description ." <br>";
    }

    public function calculateDiscount(){
        echo $this->pPrice = $this->pPrice - $this->pPrice*0.1;
    }
}