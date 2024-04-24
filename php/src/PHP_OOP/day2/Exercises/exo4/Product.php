<?php

abstract class Product{
    public $description;

    public function __construct($description){
        $this->description = $description;
    }
    abstract function getPrice();
    abstract function getDescription();
    
}