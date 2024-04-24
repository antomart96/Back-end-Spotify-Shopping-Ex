<?php

require_once "Animal.php";

class Cat extends Animal{
    public function miaow(){
        echo "Miaow!<br>";
    }
}