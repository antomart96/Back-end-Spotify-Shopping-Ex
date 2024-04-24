<?php

$id = $_POST['id'];
$db = mysqli_connect('db', 'root', 'root', 'spotify');

if ($db) {
    $query = "SELECT * FROM songs WHERE id=$id";
    $result = mysqli_query($db, $query);
    $songs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $song = $songs[0];
    $query = "SELECT * FROM artists";
    $result = mysqli_query($db, $query);
    $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<form method="POST" action="updateSong.php">
    <input type="text" name="title" value="<?= $song['title'];?>">
    <input type="date" name="release_date" id="" value="<?= $song['release_date'];?>">
    <select name="artist_id" >
        <?php foreach ($artists as $artist) : ?>
            <?php if($artists['id'] == $song['id']) : ?>
            <option selected value="<?= $artist['id'] ?>"><?= $artist['name'] ?></option>
            <?php else: ?>
            <option value="<?= $artist['id'] ?>"><?= $artist['name'] ?></option>
            <? endif ?>
        <? endforeach ?>
    </select>
    <input type="hidden" name="id" value="<?= $song['id']?>">
    <input type="submit" value="Submit" name="submitBtn">
</form>
<a href="songs.php"> Return </a>