<?php

$id = $_POST['id'];
$db = mysqli_connect('db', 'root', 'root', 'spotify');

if ($db) {
    $query = "SELECT * FROM artists WHERE id=$id";
    $result = mysqli_query($db, $query);
    $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $artist = $artists[0];
}
?>
<form method="POST" action="updateArtist.php">
    <input type="text" name="name" value="<?= $artist['name'];?>">
    <input type="text" name="bio" id="" value="<?= $artist['bio'];?>">
    <input type="text" name="gender" value="<?= $artist['gender'];?>">
    <input type="date" name="date_of_birth" id="" value="<?= $artist['date_of_birth'];?>">
    <input type="text" name="poster" id="" value="<?= $artist['poster'];?>">
    <input type="hidden" name="id" value="<?= $artist['id']?>">
    <input type="submit" value="Submit" name="submitBtn">
</form>
