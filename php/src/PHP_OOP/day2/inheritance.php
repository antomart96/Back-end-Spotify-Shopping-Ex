<?php

class Vehicule{
    public $color;
    protected $brand;
    //protected = accessible inside this class and a child class
    public function __construct($brand, $color){
        $this->brand =$brand;
        $this->color = $color;
    }

    public function horn(){
        echo "BEEP BEEP<br>";
    }
}

//Car class has the attributes/methodes of the Vehicule class
class Car extends Vehicule{
    // attribute is unique to the Car class
    private $nbDoors;

    public function __construct($brand, $color, $nbDoors){
        $this->nbDoors = $nbDoors;
        // parent:: references what has already been defined in the parent class, in this case it's the constructor
        parent::__construct($brand, $color);
    }

    public function slamDoor(){
        echo "Bam!<br>";
    }

    public function getBrand(){
        return $this->brand;
    }
}

class Truck extends Vehicule{
    private $loadCapacity;

    public function __construct($brand, $color, $loadCapacity)
    {
            $this->loadCapacity = $loadCapacity;
            parent::__construct($brand, $color);
    }
}

$myVehicule = new Vehicule('Audi', 'Black');
$myCar = new Car('Renault', 'Yellow', 3);
$myTruck = new Truck('Volvo', 'White', 16);

echo "<pre>";
var_dump($myVehicule);
echo "</pre>===<br>";
echo "<pre>";
var_dump($myCar);
echo "</pre>===<br>";
echo "<pre>";
var_dump($myTruck);
echo "</pre>===<br>";
