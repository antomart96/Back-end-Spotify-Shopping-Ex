<?
/* EXERCISE 1


An animal is represented by a number of legs, a color, a gender and a name.
A dog is able to bark.
A cat is able to meow.

    -> Create the matching classes
*/
require_once "Cat.php";
require_once "Dog.php";

$cat = new Cat(4, 'blue', 'girl', 'pink');
$dog = new Dog(4, 'red', 'good boy', 'Clifford');
$cat->miaow();
$dog->bark();