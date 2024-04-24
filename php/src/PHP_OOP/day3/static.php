<?php

class Sheep{
    private $name;
    private $count;
    public static $countCloned = 0;

    public function __construct($n){
        $this->name = $n;
        // we need to use self:: to access our static attribute
        $this->count = self::$countCloned + 1;
        // increment the counter for every new sheep
        self::$countCloned += 1;
    }

    public static function example(){
        echo "Doing something<br>";
    }
}

//To call my static element outside the class définnition, we mus specify the class name
Sheep::example();

echo "Number of clone : " . Sheep::$countCloned . "<br>";

$sheep1 = new Sheep("Shhep 1");
$sheep2 = new Sheep("Shhep 2");
$sheep3  = new Sheep("Shhep 3");

echo "Number of clone : " . Sheep::$countCloned . "<br>";

//Static attributes are not accessible through objects
echo $sheep1->countCloned;
// But static methods are
$sheep2->example();