<?php

require_once "Human.php";
require_once "IWorker.php";

class Person extends Human implements IWorker{

    public $nationality;

    public function __construct(){
        $this->age =18;
        
    }
    public function live(){
        echo "I am alve";
    }

    public function work(){
        echo "I work";
    }
}

$antoine = new Person("Antoine", 65);

echo $antoine->name;

echo $antoine::BRAIN;
echo Human::BRAIN;

echo $antoine->$nationality;

$antoine->live();