<?php

require_once('LivingBeing.php');

class Human extends LivingBeing
{
    public $work;
    public $sound;
    public $name;
    public $color;
    public $gender;

    public function __construct($work, $sound, $name, $color, $gender){
        $this->work = $work;
        $this->sound = $sound;
        $this->name = $name;
        $this->color = $color;
        $this->gender = $gender;
    }

    public function makeSound(){
        echo $this->sound . "<br>";
    }

    public function displayInfo(){
        echo "$this->name is a $this->color $this->gender <br>";
    }

    public function workPlace(){
        echo $this->work . "<br>";
    }


}
