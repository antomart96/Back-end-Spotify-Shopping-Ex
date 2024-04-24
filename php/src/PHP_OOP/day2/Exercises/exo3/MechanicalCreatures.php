<?php
abstract class MechanicalCreatures{
    public $color;
    public $identifier;

    public function __construct($color, $id){
        $this->color = $color;
        $this->identifier = $id;
    }
}