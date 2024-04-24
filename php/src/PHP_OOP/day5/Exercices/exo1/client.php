<?php

require_once 'Robot.php';
require_once 'Human.php';
require_once 'Cat.php';
require_once 'Dog.php';

$simon = new Human('Simon', 'brown', 'Male', 1.79);
$camel = new Human('Camel', 'brown', 'Male', 1.90);
$natalia = new Human('Natalia', 'brown', 'Female', 1.72);
$bender = new Robot(1023, 'silver');

$humans = [$simon, $camel, $natalia,$bender];

$injuredHumans = [];

foreach ($humans as $human) {
    try{
        $human->work();
    }catch (Exception $e){
        echo $e->getMessage();
        unset($humans[$key]);
        $injuredHumans[] = $human;
    }
}   

echo "<pre>";
var_dump($humans);
echo "</pre>";

echo '<hr>';

echo "<pre>";
var_dump($injuredHumans);
echo "</pre>";
