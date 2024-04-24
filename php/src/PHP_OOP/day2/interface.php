<?php

abstract class LivingBeing{
    abstract public function makeSound();
    abstract public function displayInfo();
}

// by convention, all interfaces start with "I"
interface IActions{
    // the abstract in implicit, so we don't need to write it
    public function work();
}

interface IMovements{
    public function run();
}

// implements = import all methods from interface
// !! not the same thing as extends !!
class Robot implements IActions{
    public function work(){
        echo "Robot is working<br>";
    }
}

class Human implements IActions, IMovements{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function run(){
        echo "I'm so fast !! <br>";
    }

    public function work(){
        echo "I hate this job...<br>";
    }
}
