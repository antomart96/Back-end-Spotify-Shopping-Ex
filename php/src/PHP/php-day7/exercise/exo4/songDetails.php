<?php
/*
More Spotify
    Step 1 :
    In your spotify database edit your songs table and
    add a new "path"(text) field
    Step 2 :
    Update your addSong.php to allow you to upload sound files(songs) into the songs folder on your pc
    
    Step 3 :
    When adding a new song, save the path to the uploaded song into your database in the new path field
    
    Step 4 :
    Create the songDetails.php page that allows you to listen to the songs.
    Link to this page on the songs.php page.
    
    <audio>
        <source src="path/to/song" type="audio/mpeg">
    </audio>
    
    Step 5 ~bonus :
    Create a log file. Everytime a database action is performed, 
    add a new line to the log file with the following format : 
    "$user added $song on $date" OR "$user deleted $song on $date" OR "$user update $song on $date" ...
*/
session_start();
$db = mysqli_connect('db', 'root' , 'root', 'spotify');
if($db){
    $query = "SELECT title, path FROM songs WHERE id= $_POST[id]";

    $result = mysqli_query($db, $query);
    $song = mysqli_fetch_assoc($result);
    echo "$song[title]  <br>";
    echo "<audio controls>
            <source src='$song[path]' type='audio/mpeg'>
        </audio> ";
        date_default_timezone_set('Europe/Luxembourg');
        file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " is listening this music : " . "'" . $song['title'] . "'" . " on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);
}
?>
<a href="songs.php"> Return </a>
