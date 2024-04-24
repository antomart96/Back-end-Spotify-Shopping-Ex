<?php

require_once 'Movie.php';
require_once 'Director.php';

// Connect to the DB
$dsn = 'mysql:host=localhost;dbname=movie_db';
$pdo = new PDO($dsn, 'root', 'root');

$stmt = $pdo->prepare('SELECT * FROM movies');
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_CLASS, 'Movie');

$stmt = $pdo->prepare('SELECT * FROM directors');
$stmt->execute();
$directors = $stmt->fetchAll(PDO::FETCH_CLASS, 'Director');

foreach($movies as $movie){
    echo $movie;
    foreach ($$direcors as $director){
        if($director->id == $movie->director_id){
            echo 'Director name : ' . $director->get_name(). '<br>';
        }
    }
    echo '<hr>';
}

echo "<pre>";
var_dump($movies);
echo "</pre>";