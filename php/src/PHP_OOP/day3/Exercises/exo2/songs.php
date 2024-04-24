<?php

$dsn ="mysql:host=db;dbname=spotify";

$pdo = new PDO($dsn, 'root', 'root');

$results = $pdo->query('SELECT songs.*, artists.name 
FROM songs 
INNER JOIN artists ON artists.id = songs.artist_id');


$songs = $results->fetchAll(PDO::FETCH_ASSOC);
echo "<br><hr>";
$pdo = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        <!-- <p>
            <strong>Artist : </strong>
            <?= $song['name']; ?>
        </p> -->
        <!-- <form action="deleteSong.php" method="POST">
            <input type="hidden" name="id" value="<?=$song['id']; ?>">
            <input type="hidden" name="title" value="<?=$song['title']; ?>">
            <input type="submit" value="Delete">
        </form>

        <form action="updateSongForm.php" method="POST">
            <input type="hidden" name="id" value="<?=$song['id']; ?>">
            <input type="submit" value="Update">
        </form> -->
        <!-- <form action="song-details.php" method="POST">
            <input type="hidden" name="id" value="<?=$song['id']; ?>">
            <input type="submit" value="Listen">
        </form> -->
        <a href="./song-details.php?id=<?= $song['id']; ?>" >Listen</a>
        <hr>
    <?php endforeach; ?>
</body>
</html>    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allUsers as $user): ?>
                <tr>
                    <td><?php echo $user->getId(); ?></td>
                    <td><?php echo $user->getUsername(); ?></td>
                    <td><?php echo $user->getEmail(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  