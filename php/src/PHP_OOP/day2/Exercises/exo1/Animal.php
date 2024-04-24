<?php

class Animal{
    public $legs;
    public $color;
    public $gender;
    public $name;

    public function __construct($legs, $color, $gender, $name){
        $this->legs = $legs;
        $this->color = $color;
        $this->gender = $gender;
        $this->name = $name;
    }
}


