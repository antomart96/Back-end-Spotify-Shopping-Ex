<?php

// Class definition
class Car {
}

// Create an object : instance of a class
$myCar = new Car();
$mySecondCar = new Car();

var_dump($myCar);
var_dump($mySecondCar);


// Let's create some methods and attributes !
// Remember : methods are functions internal to the class
// Attributes are variables internal to the class
// Both these elements must have a visibility setting (public, private or protected)
class Car2 {
    // Public = available everywhere (even outside the class file)
    public $brand;

    // Private = available ONLY in the class file
    private $model;

    // Methods are still functions, so we need to define them the same way
    public function accelerate(){
        // $this-> is used to reference another method or attribute of this class
        // we need to use it if we want to work with the private visibility
        // here we give $model a value, since it's private we could not do it the same way as $brand
        $this->model = "Mustang";
        echo $this->model . " goes 'Brrrrr'";
    }
}

$newCar2 = new Car2();
$newCar2->brand = "Ford";
$newCar2->accelerate();

echo '<pre>';
var_dump($newCar2);
echo '</pre>';


// The constructor is a method that allows you to initialise properties when creating a new object
class Car3 {
    // Declare properties
    public $color;
    public $brand;
    private $model;

    // "__" means this method needs to be used in a specific way
    public function __construct($color, $brand, $model){
        $this->color = $color;
        $this->brand = $brand;
        $this->model = $model;
    }

    // called when writing "echo [object]"
    public function __toString(){
        return 'Car details : color = ' . $this->color . '<br>';
    }
}

// this object definition uses the __construct method set in the Car3 class
$otherCar = new Car3('red', 'Ferrari', 'F40');

echo $otherCar->color . '<br>';

echo $otherCar;

//Encapsulation
//Used to protect the state of an object. To access/modify our attributes we will use setters/getters methods.
// These methods will allow us to work with private attributes that we could not read or modify otherwise.

class Car4{
    private $color;
    public $brand;
    public $model;

    public function __construct($color, $brand, $model){
        $this->brand =$brand;
        $this->model =$model;
        $this->setColor($color);
    }

    //Setter for color
    public function setColor($color){
        //Filter possible values
        // Let's allow these three : red, green and blue
        if ($color != 'red' && $color != 'green' && $color != 'blue') {
            echo "Choose a valid color (red/green/blue)!"; 
        }else{
            $this->color = $color;
        }
    }

    public function getColor(){
        return $this->color;
    }
}

$myNewCar = new Car4('Yellow', 'Mazda', 'Miata');

$myNewCar->setColor('green');

echo '<pre>';
var_dump($myNewCar);
echo '</pre>';

echo $myNewCar->getColor();