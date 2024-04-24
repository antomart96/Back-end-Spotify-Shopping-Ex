<?php

require "verif.php";

$db = mysqli_connect('db','root','root','spotify');
if($db)
{
    // Fetch all the playlists
    $query = "SELECT * FROM playlists WHERE user_id = $_SESSION[id]";
    $result = mysqli_query($db,$query);
    $playlists = mysqli_fetch_all($result,MYSQLI_ASSOC);
    

    //Ricardo Solution
    // $queryPlaylists="SELECT playlists.name,GROUP_CONCAT(songs.title SEPARATOR '\n') AS song_titles
    // FROM playlists 
    // INNER JOIN playlist_songs ON playlists.id = playlist_songs.playlist_id
    // INNER JOIN songs on playlist_songs.songs_id = songs.id
    // WHERE user_id = $_SESSION[id]
    // GROUP BY playlists.name";

    // $result = mysqli_query($db,$queryPlaylists);
    // $Riccardoplaylists = mysqli_fetch_all($result,MYSQLI_ASSOC);   

    // var_dump(explode(PHP_EOL, $Riccardoplaylists[0]['song_titles']));
}

?>

<? require "nav.html"; ?>
<h2>Playlists</h2>
<a href="newPlaylist.php">Add new playlist</a>
<!-- Loop through all our playlists and display them -->
<?php foreach($playlists as $playlist) : ?>
    <div>
        <p><?= $playlist['name'] ?></p>
        <a href='<?= "populatePlaylist.php?id=$playlist[id]" ?>'>Add songs</a>
        <div>
            <!-- Inside our display loop. Fetch all the songs for a playlist and display them -->
            <?php
            $query = "SELECT * FROM songs
            INNER JOIN playlist_songs
            ON playlist_songs.songs_id = songs.id
            WHERE playlist_songs.playlist_id = $playlist[id]";
            $result = mysqli_query($db, $query);
            $songs = mysqli_fetch_all($result,MYSQLI_ASSOC);
            ?>
            <ul>
                <!-- Loop through all the songs of the playlist and display them -->
                <?php foreach($songs as $song) : ?>
                    <li><?= $song['title']?></li>
                <? endforeach ?>
            </ul>
        </div>
    </div>
    <?php endforeach ?>
