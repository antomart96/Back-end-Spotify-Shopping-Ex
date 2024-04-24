<?php
session_start();
$db = mysqli_connect('db', 'root' , 'root', 'spotify');


if($db){

    $query = "UPDATE artists SET name= '$_POST[name]', bio= '$_POST[bio]', gender= '$_POST[gender]', date_of_birth= '$_POST[date_of_birth]', poster= '$_POST[poster]' WHERE id= $_POST[id]";

    $result = mysqli_query($db, $query);

    if($result)
    {
        echo "Artist successfuly updated";
    }else{
        echo "Something went wrong";
    }
    date_default_timezone_set('Europe/Luxembourg');
    file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " update an Artist : ". "'" . $_POST['name'] . "'" ." on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);
}
?>

<a href="artists.php"> Return </a>
