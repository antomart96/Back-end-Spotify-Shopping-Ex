<?php

abstract class Shape{

    public $x;
    public $y;

    public function __construct($x,$y){
        $this->x = $x;
        $this->y = $y;
    }

    abstract function calculateSurface();
}

class Circle extends Shape{
    public $diameter;

    public function __construct($diameter){
        $this->diameter = $diameter;
    }

    public function calculateSurface(){
        echo pow(($this->diameter / 2), 2) * pi() . "<br>";
    }
}

class Rectangle extends Shape{
    public function calculateSurface(){
        echo $this->x * $this->y . "<br>";
    }
}

$myCircle = new Circle(5);
$myCircle->calculateSurface();

$myRectangle = new Rectangle(3, 4);
$myRectangle->calculateSurface();
