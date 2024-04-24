<?php

/* EXERCISE 3

In this exercise, you have to use PDO.

Step 0 : 
Create a new database 'flower_db' and create the 'flowers' table.
It will contain: The name of the flower and it's price

Step 1 : Display flowers
- Create a class FlowerManager.
Create a static public method findAll() that will retrieve all the flowers and return the result using PDO::FETCH_ASSOC.
- Create the page view-flowers.php
Display all the flowers on the page using FlowerManager::findAll();

Step 2 :
- Edit the FlowerManager class.
Add a new public static method find($id).
This function retrieve one specific flower (thanks to the id in the argument) and returns it.

- Create page 'flower-detail.php'
Use get method (same as movie) to grab the id of the flower.
- Display the flower in this page using FlowerManager::find($id)

Step 3 : 
- Edit 'view-flowers.php' page.
Display a link, for each flower, to see the detail page.

Step 4 : 
4.1 : Create a class Flower.
It will have three public properties : id, name and price.
4.2 : Edit FlowerManager 'findAll' and 'find' methods.
These methods should now use FETCH_CLASS !! 
What you get when you fetch is object now!
You have to also edit 'view-flowers.php' and 'flower-detail.php' to use Object Syntax (not array).
*/
