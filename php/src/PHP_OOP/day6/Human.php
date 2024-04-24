<?php

//Defintion of a class
abstract class Human{

    //properties
    public $name;

    private $weight;

    protected $age;

    const BRAIN = true;

    //constructor
    public function __construct($name, $weight, $age)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->age = $age;
    }

    public function calculateBMI(){
        return $this->weight/1.80;
    }

    public static function describeHuman(){
        echo "A human usually has 4 limbs";
    }

    public static $numberOfLimbs = 4;
    
    abstract function live();
}

$antoine = new Human('Antoine', 65, 27);

echo $antoine->name;

$antoine::describeHuman();
Human::describeHuman();

echo $antoine::$numberOfLimbs;
echo Human::$numberOfLimbs;