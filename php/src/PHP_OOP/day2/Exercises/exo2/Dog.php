<?php

require_once('Animal.php');

class Dog extends Animal
{
    public $breed;
    public $sound;
    public $name;

    public function __construct($breed, $sound, $name)
    {
        $this->breed = $breed;
        $this->sound = $sound;
        $this->name = $name;
    }

    public function makeSound()
    {
        echo $this->sound . "<br>";
    }

    public function displayInfo()
    {
        echo "This dog is named $this->name and it's a $this->breed <br>";
    }
}
