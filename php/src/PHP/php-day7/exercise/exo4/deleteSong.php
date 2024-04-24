<?php
session_start();
//Deleting rows

$db = mysqli_connect('db', 'root', 'root', 'spotify');

if($db){

    $query = "DELETE FROM songs WHERE id = $_POST[id]";
    
    $result = mysqli_query($db,$query);

    if($result)
    {
        echo "Music deleted succesfully";
    }else{
        echo "Something went wrong";
    } 
    date_default_timezone_set('Europe/Luxembourg');
    file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " deleted  " . "'" . $_POST['title'] . "'"  . " on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);
}
?>

<a href="songs.php">Return
</a>
