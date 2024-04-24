<?php 
$baseSalary = 35000;
$overtime = 10;
$rate = 20;

function getWage($baseSalary, $overtime, $rate ){
    return $baseSalary + ($overtime *$rate );
}
getWage($baseSalary, $overtime, $rate );

// With oop small abstraction. We remove the definition of an employee from the main script to create more readable and scalable code.
require_once "./Employee.php";

$employee = new Employee(45000, 20, 50);
$employee->getWage();
