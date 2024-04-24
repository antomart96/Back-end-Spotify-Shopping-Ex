<?php
 require 'verif.php';


$db = mysqli_connect('db', 'root', 'root', 'spotify');

if ($db) {
    $query = "SELECT * FROM artists";
    $result = mysqli_query($db, $query);

    $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);   
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
    <h1>Artists page</h1>
    <?php foreach ($artists as $artist) : ?>
        <p>
            <strong>Name : </strong>
            <?= $artist['name']; ?>
        </p>
        <p>
            <strong>Picture : </strong>
            <img style="width: 200px;" src="<?= $artist['poster']; ?>" alt="">
        </p>
        <form action="deleteArtist.php" method="POST">
            <input type="hidden" name="id" value="<?=$artist['id']; ?>">
            <input type="submit" value="Delete">
        </form>

        <form action="updateArtistForm.php" method="POST">
            <input type="hidden" name="id" value="<?=$artist['id']; ?>">
            <input type="submit" value="Update">
        </form>
        <hr>
    <?php endforeach; ?>
</body>
</html>