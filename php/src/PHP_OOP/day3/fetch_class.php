<?php

require_once "Song.php";

$dsn = "mysql:host=db;dbname=spotify";
$pdo = new PDO($dsn, 'root', 'root');

$query = $pdo->query('SELECT * FROM songs');
// PDO::FETCH_CLASS allows to use a class as a blueprint for our data
// It will create an array of Song objects, one object representing one row of the table. This process is called "hydration".
$songs = $query->fetchAll(PDO::FETCH_CLASS, 'Song');

foreach ($songs as $song) {
    echo $song;
}

echo "<pre>";
var_dump($songs);
echo "</pre>";


