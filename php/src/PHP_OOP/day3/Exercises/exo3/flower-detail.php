<?php

require_once "FlowerManager.php";

$flower = FlowerManager::find($_GET['id']);

echo "Title : $flower->name  <br>";
echo "Date : $flower->price  <br>";