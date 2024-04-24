<?php
session_start();
$db = mysqli_connect('db', 'root' , 'root', 'spotify');


if($db){

    $query = "UPDATE songs SET title= '$_POST[title]', release_date= '$_POST[release_date]', artist_id= $_POST[artist_id] WHERE id= $_POST[id]";

    $result = mysqli_query($db, $query);

    if($result)
    {
        echo "Music successfuly updated";
    }else{
        echo "Something went wrong";
    }
    date_default_timezone_set('Europe/Luxembourg');
    file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " update a Song : " . "'" . $_POST['title'] . "'" . " on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);

}


?>

<a href="songs.php"> Return </a>
