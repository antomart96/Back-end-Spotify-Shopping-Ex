<?php
session_start();
//Deleting rows

$db = mysqli_connect('db', 'root', 'root', 'spotify');

if($db){
    $query = "DELETE FROM artists WHERE id = $_POST[id]";
    
    $result = mysqli_query($db,$query);
    $artist = mysqli_fetch_assoc($result);
    if($result)
    {
        echo "Artists deleted succesfully";
    }else{
        echo "Something went wrong";
    }
    date_default_timezone_set('Europe/Luxembourg');
    file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " deleted  " . "'" . $artist['name'] . "'"  . " on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);

}

?>

<a href="artists.php">
    Return
</a>
