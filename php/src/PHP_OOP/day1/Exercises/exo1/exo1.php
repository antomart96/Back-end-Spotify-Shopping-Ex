<?php

/* EXERCISE 1

A Human is represented by a name, a haircolor, a gender and a height.

Create the matching class.
Use the constructor to initialize your property quickly.

The name should not be editable after the creation of the object.

Create two different object from this class.
Display the two objects using toString().
    
*/

require_once "./Human.php";
$antoine = new Human('Antoine', 'brown', 'male', 174 );
$thomas = new Human('Thomas', 'blond', 'male', 174 );

echo $antoine . '<br>';
echo $thomas . '<br>';
