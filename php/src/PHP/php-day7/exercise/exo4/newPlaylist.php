<?php
require "verif.php";
$db = mysqli_connect('db','root','root','spotify');

if($db){
    if(isset($_POST['submit']))
    {
        $query = "INSERT INTO playlists (name, user_id) 
                  VALUES ('$_POST[playlist]', $_SESSION[id])";
        $result = mysqli_query($db, $query);
        if($result)
        {
            header("location: playlist.php");
            exit();
        }else{
            echo "somethign went wrong";
        }
        date_default_timezone_set('Europe/Luxembourg');
        file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " added  : " . "'" . $_POST['playlist']  . "'" . " on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);
    }
}

?>

<form method="POST">
    <label for="playlist">Playlist name</label>
    <input type="text" name="playlist" id="playlist">
    <input type="submit" value="submit" name="submit">
</form>
<a href="playlist.php">Nevermind</a>
