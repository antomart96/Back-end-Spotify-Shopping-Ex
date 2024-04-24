<?php
 require 'verif.php';

    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    if ($db) {
        $query = "SELECT * FROM artists";

        $result = mysqli_query($db, $query);
        $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);   

        mysqli_close($db);
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
    <h2>ADD SONG</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title">
        <input type="date" name="release_date">
        <select name="artist_id" id="" >
            <?php foreach($artists as $artist) : ?>
                <option value="<?=$artist['id']?>"><?= $artist['name']?></option>
                <? endforeach ?>
        </select>
        <input type="file" name="myFileSong">
        <input type="submit" value="Submit" name="submitBtn">
    </form>
</body>
</html>
<?php

if(isset($_POST['submitBtn']))
{
    $tmpName = $_FILES['myFileSong']['tmp_name'];
    $path = "songs/" . $_FILES['myFileSong']['name'];

    if (is_dir("./songs")) {
       move_uploaded_file($tmpName, $path);
    }else {
        mkdir("songs");
        move_uploaded_file($tmpName,$path);
    }
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    if ($db) {
        $query = "INSERT INTO songs(title, release_date, artist_id, path) VALUES ('$_POST[title]', '$_POST[release_date]', $_POST[artist_id], '$path ');";

        $result = mysqli_query($db, $query);

        if($result){
            echo "New Song added succesfully <br>";
        }else{
            echo "Something went wrong <br>";
        }
    }
    date_default_timezone_set('Europe/Luxembourg');
    file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " added a Song :" . "'" . $_POST['title'] . "'" . " on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);

}