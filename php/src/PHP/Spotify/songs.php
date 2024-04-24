<?php
 require 'verif.php';

/*
-- SPOTIFY Exercise : 
- Part 1 :
Create a 'songs.php' page where you display all the songs with : title / category
- Part 2 :
Add a new attribute to "artists" table.
This attribute is "poster" (we will save url/path to picture).
Create an "artists.php" page to display : name / picture
- Part 3 :
Create a navigation menu to navigate to the different pages.
Use "include" or "require" on every pages to include the navbar.
- Part 4 : 
Create a "home.php" page (home) to display latest 3 songs (release_date)
*/

$db = mysqli_connect('db', 'root', 'root', 'spotify');

if ($db) {
    $query = "SELECT * FROM songs";
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
    <h1>Songs page</h1>
    <?php foreach ($songs as $song) : ?>
        <p>
            <strong>Title : </strong>
            <?= $song['title']; ?>
        </p>
        <p>
            <strong>Release Date : </strong>
            <?= $song['release_date']; ?>
        </p>
        <form action="deleteSong.php" method="POST">
            <input type="hidden" name="id" value="<?=$song['id']; ?>">
            <input type="hidden" name="title" value="<?=$song['title']; ?>">
            <input type="submit" value="Delete">
        </form>

        <form action="updateSongForm.php" method="POST">
            <input type="hidden" name="id" value="<?=$song['id']; ?>">
            <input type="submit" value="Update">
        </form>
        <form action="songDetails.php" method="POST">
            <input type="hidden" name="id" value="<?=$song['id']; ?>">
            <input type="submit" value="Listen">
        </form>
        <hr>
    <?php endforeach; ?>
</body>
</html>