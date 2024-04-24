<?php
/*
    Exercise 2
    
    Create an abstract class animal with two abstract methods
    makeSound() and displayInfo().

    Create two children of this class (Dog & Cat) with their own properties that will implement these methods from the parent animal.
*/

require_once "Cat.php";
require_once "Dog.php";

$cat = new Cat("grey", "meow", "Mr. Pickles");
$cat->makeSound();
$cat->displayInfo();

$dog = new Dog("German Sheperd", "bark", "Rufus");
$dog->makeSound();
$dog->displayInfo();