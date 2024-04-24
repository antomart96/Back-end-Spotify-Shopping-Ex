<?php

require_once "Product.php";


class RegularProduct extends Product{
    public $rPrice;

    public function __construct($rPrice, $description){
        $this->rPrice = $rPrice;
        parent::__construct($description);
    }

    public function getPrice(){
        echo $this->rPrice ." <br>";
    }

    public function getDescription(){
        echo $this->description ." <br>";
    }


}  
