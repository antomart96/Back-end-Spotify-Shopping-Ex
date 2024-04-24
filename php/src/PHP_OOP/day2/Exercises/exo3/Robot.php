<?php

require_once('MechanicalCreatures.php');

class Robot extends MechanicalCreatures{
    public $work;

    public function __construct($color, $identifier, $work){
        $this->work = $work;
        parent::__construct($color, $identifier);
    }
    public function workPlace(){
        echo $this->work . "<br>";
    }

}