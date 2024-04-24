<?php

require_once('LivingBeing.php');

class Cat extends LivingBeing
{
    public $color;
    public $sound;
    public $name;

    public function __construct($color, $sound, $name)
    {
        $this->color = $color;
        $this->sound = $sound;
        $this->name = $name;
    }

    public function makeSound()
    {
        echo $this->sound . "<br>";
    }

    public function displayInfo()
    {
        echo "$this->name is a $this->color cat<br>";
    }
}
