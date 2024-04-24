<?php 
class Employee{
    private $baseSalary;
    private $overtime;
    private $rate;

    public function __construct($baseSalary, $overtime, $rate){
        $this->baseSalary = $baseSalary;
        $this->overtime = $overtime;
        $this->rate = $rate;
    }

    public  function getWage(){
        return $this->baseSalary +($this->overtime * $this->rate);
    }
}