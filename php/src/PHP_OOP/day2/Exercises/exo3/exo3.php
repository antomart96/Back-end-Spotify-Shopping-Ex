<?php

/* EXERCISE 3

    Using Exercise 2.

    - Step 1 :
        Add a new class called 'Human'. It will inherit from the same parent class as Dog and Cat. 
        Rename this parent class to 'LivingBeing'.
        The humans can make sounds but they can also work. Create what's necessary so they can make this new action.

    - Step 2 :
        In this file (ex3.php) :

        1. Create an array of animals and humans (cats, dogs or humans)
        2. Create a script where :
            - Loop through the array
            - Each time the current object should make a sound

    - Step 3 :
        Let's introduce new participants : robots !
        You must create 2 new classes, a parent (MechanicalCreatures) and a child (Robot).
        All mechanical creatures have a color and an identifier. Like the humans, robots can work.
        Create the necessary attributes and methods. Then, add a robot to your array and it should work each time the loop runs.
        Tip : use 'instanceof' to make sure the item of the array is a robot.


*/
 require_once "Human.php";
 require_once "Dog.php";
 require_once "Cat.php";
 require_once "Robot.php";

 $cat = new Cat("grey", "meow", "Mr. Pickles");
 $dog = new Dog("German Sheperd", "bark", "Rufus");
 $human = new Human("chop wood", "Bla bla bla", "Antoine", "white","male");
 $robot = new Robot("green" , "R2-6M" , "chop wood");

 $livingBeings = [$cat , $dog, $human, $robot];

 foreach ($livingBeings as $livingBeing ) {
    if($livingBeing instanceof Robot) {
        $livingBeing->workPlace();
    }else{
        $livingBeing->makeSound();
    }
}










