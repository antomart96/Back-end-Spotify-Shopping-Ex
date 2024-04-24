<?php
 require 'verif.php';

    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    if ($db) {
        $query = "SELECT * FROM artists";

        $result = mysqli_query($db, $query);
        $authors = mysqli_fetch_all($result, MYSQLI_ASSOC);   

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
    <h2>ADD ARTISTS</h2>
    <form method="POST">
        <input type="text" name="name">
        <input type="text" name="bio">
        <input type="text" name="gender">
        <input type="date" name="date_of_birth">
        <input type="text" name="poster">
        <input type="submit" value="Submit" name="submitBtn">
    </form>
</body>
</html>
<?php

if(isset($_POST['submitBtn']))
{
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    if ($db) {
        $query = "INSERT INTO artists(name, bio, gender, date_of_birth, poster) VALUES ('$_POST[name]', '$_POST[bio]', '$_POST[gender]','$_POST[date_of_birth]', '$_POST[poster]');";

        $result = mysqli_query($db, $query);

        if($result){
            echo "New Artist added succesfully <br>";
        }else{
            echo "Something went wrong <br>";
        }
    }
    date_default_timezone_set('Europe/Luxembourg');
    file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " added an Artise : " . "'" .  $_POST['name']  . "'" . " on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);
}