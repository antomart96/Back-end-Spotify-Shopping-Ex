<?php
require "verif.php";

$db = mysqli_connect('db','root','root','spotify');
//Fetch all the songs
$query = "SELECT * FROM songs";
$result = mysqli_query($db, $query);
$songs = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Fetch songs in the current playlist
$query = "SELECT songs.id FROM songs
          INNER JOIN playlist_songs ON songs_id = songs.id
          WHERE playlist_songs.playlist_id = $_GET[id]";
$result = mysqli_query($db, $query);
$selectedSongs = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Fetch the ids of songs
$selectedSongIds = [];
foreach($selectedSongs as $selectedSong)
{
    $selectedSongIds[] = $selectedSong['id'];
}

if(isset($_POST['btn']))
{
    //This next step is broken into two parts. Add new songs and remove old songs

    //First we add the new songs
    $newLines = 0;
    //Loop through all songs sent by the form submit
    foreach($_POST['songs'] as $key => $song)
    {
        //Since we receive all songs that are checked from our checkbox inputs 
        //including songs that are in the db already.
        //We check to see if the song is already in the array before adding it again.
        //This is to avoid duplicate songs in the playlist
        if(!in_array($song, $selectedSongIds)){
            $query = "INSERT INTO playlist_songs (playlist_id, songs_id, position) VALUES ($_GET[id], $song, $key)";
            $result = mysqli_query($db, $query);
            if($result){
                $newLines++;
            }else{
                echo "something went wrong";
            }
        }
    }
    //Part two of this operation is to remove songs that are no longer selected
    //from the playlist
    $removedSongs = 0;
    //First step loop over all songs that are in our database
    foreach($selectedSongIds as $song)
    {
        //Check if the song is in the array we received from the form submission.
        //If a song is missing it is no longer selected and can be removed from the database
        if(!in_array($song, $_POST['songs']))
        {
            $query = "DELETE from playlist_songs WHERE playlist_id = $_GET[id] AND songs_id = $song";
            
            $result = mysqli_query($db, $query);
            if($result)
            {
                $removedSongs++;
            }else{
                echo "Something went wrong";
            }
        }
    }
    echo "removed $removedSongs songs from the playlist <br>";
    echo "Added $newLines songs to playlist <br>";
    //Finale step is to update our layout to reflect
    //the new song additions and deletions
    
}
?>
<h2>Add songs</h2>
<form method='POST'>
    <!-- We loop through all songs in our database and display them -->
    <?php foreach($songs as $song) : ?>
        <!-- Here we display them in input:checkboxs AND we check to see if the song is part of our selcetedSongs array -->
        <!-- Remeber the selectedSongs array is all the songs that our playlist already contains -->
        <label for="<?= $song['id']?>"><?=$song['title']?></label>
        <input <?php if(in_array($song['id'],$selectedSongIds)) : ?> checked <? endif?> type="checkbox" name="songs[]" id="<?= $song['id']?>" value="<?= $song["id"]?>"></br>
            <!-- we place the result of these inputs into an songs[] as defined in the name -->
    <?php endforeach ?>
    <input type="submit" value="Submit" name="btn">
</form>
<a href="playlist.php">Return</a>
