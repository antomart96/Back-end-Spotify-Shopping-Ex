<?php
class Human{
    private $name;
    public $haircolor;
    public $gender;
    public $height;

    public function __construct($name, $haircolor, $gender, $height){
        $this->name = $name;
        $this->haircolor = $haircolor;
        $this->gender = $gender;
        $this->height = $height;
    }
    public function getName(){
        return $this->name;
    }

    public function __toString(){
       return 'The human name is ' . $this->getName() . ' the hairecolor is ' . $this->haircolor . ' the gender is ' . $this->gender  . ' and the height is ' . $this->height;
    }
}