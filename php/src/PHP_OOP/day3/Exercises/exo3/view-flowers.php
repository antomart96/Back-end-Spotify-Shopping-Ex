<?php

require_once "FlowerManager.php";

$flowers = FlowerManager::findAll();

foreach ($flowers as $flower) {
    echo $flower->name . ' ';
    echo $flower->price;
    echo "<a href='./flower-detail.php?id=" . $flower->id. "'>Listen</a><br>";

}
