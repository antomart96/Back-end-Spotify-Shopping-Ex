<?php
  require 'verif.php';

$db = mysqli_connect('db', 'root', 'root', 'spotify');

if ($db) {
    $query = "SELECT * FROM songs ORDER BY release_date DESC LIMIT 3";
    $result = mysqli_query($db, $query);

    $songs = mysqli_fetch_all($result, MYSQLI_ASSOC);   
    mysqli_close($db);
}else{
    echo "Problem connection to the DB <br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'nav.html'; ?>
    <h1>Home page</h1>
    <?php foreach ($songs as $song) : ?>
        <p>
            <strong>title : </strong>
            <?= $song['title']; ?>
        </p>
        <p>
            <strong>release_date: </strong>
            <?= $song['release_date']; ?>
        </p>
        <hr>
    <?php endforeach; ?>
</body>
</html>