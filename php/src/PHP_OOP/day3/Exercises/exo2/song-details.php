<?php

$id = $_GET['id'];
$dsn ="mysql:host=db;dbname=spotify";

$pdo = new PDO($dsn, 'root', 'root');

$prep = $pdo->prepare("SELECT * FROM songs INNER JOIN artists ON songs.artist_id = artists.id WHERE songs.id = :id");
$prep->bindValue(':id', $id);
$prep->execute();
$song = $prep->fetch(PDO::FETCH_ASSOC);

echo "<br><hr>";
echo "Title : $song[title]  <br>";
echo "Date : $song[release_date]  <br>";
echo "Artist : $song[name]  <br>";
echo "<audio controls>
            <source src='$song[path]' type='audio/mpeg'>
        </audio> ";


$pdo = null;
?>
