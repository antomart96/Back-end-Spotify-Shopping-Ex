<?php

/* EXERCISE 2

Let's go back to our "spotify" DB.
If you don't have it anymore, create it again in phpMyAdmin and import spotify.sql.

For this exercise you must use PDO.

- Part 1 :
    Create a page 'songs.php' where you should see all songs.

- Part 2 :
    Create a page 'song-details.php' to display the details of a specific song.

*/

$dsn ="mysql:host=db;dbname=spotify";

$pdo = new PDO($dsn, 'root', 'root');

