<?php

/*

--SPOTIFY EXERCISE PART 2

 - part 1:

 Modifie your database. Add the following tables
 Users ( id,username, email, password);
 playlists( id, user_id, name);
 playlist_song(playlist_id, user_id, position);

 - part 2:
 Create a login.php page that on submission redirects to the home page and saves in the session the user id.
 (Fill your database with users manually. We will user registration at a later point);

 - part 3:
 require users to be logged in at all times while navigating the website

 - part 4:
 Create a playlist.php that displays all playlists a user has aswell as the songs in that playlist.

 - part 5:
 create a newPlaylist.php page that allows users to create playlists.

 -part 6:
 create the finale populatePlayliste.php page that allows users to fill the playlist with songs.
*/

session_start();
$submited = false;
if (isset($_POST['btn'])) {
	$submited = true;
    $db = mysqli_connect('db', 'root', 'root', 'spotify');

    $errors = [];
    if(empty($_POST['username']))
    {
        $errors['username'] = '<p style="color:red">Please enter a valid Name</p><br>';
    }
    if(empty($_POST['email']))
    {
        $errors['email'] =  '<p style="color:red">Please enter a valid Email</p><br>';
    }
    if(empty($_POST['password']))
    {
        $errors['password'] =  '<p style="color:red">Please enter a valid password</p><br>';
    }    
    if(empty($errors)){
        if ($db) {
            $query = "SELECT * FROM users WHERE username = '$_POST[username]' AND email = '$_POST[email]'";
            $result = mysqli_query($db, $query);
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC); 
            $user = $users[0];
            mysqli_close($db);
            $checkPassword = password_verify($_POST['password'], $user['password']);
            if ($checkPassword) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('location: home.php');
                exit();
            }
             
            }
            date_default_timezone_set('Europe/Luxembourg');
            file_put_contents('bigBrotherWatchingYou.log',  $_SESSION['username'] . " Loged in on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);
        }
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
    <form action="" method="post">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username"><br>
        <?php
            if ($submited) {
                if(!empty($errors )){
                        echo $errors['username'];
                 }
            }
        ?>  
        <label for="email">Email : </label>
        <input type="email" name="email" id="email"><br>
        <?php
            if ($submited) {
                if(!empty($errors)){
                    echo $errors['email'];
             }
            }
        ?>  
        <label for="password">Password : </label>
        <input type="password" name="password" id="password"><br>
        <?php
            if ($submited) {
                if(!empty($errors)){
                    echo $errors['password'];
             }
            }
        ?>  
        <input type="submit" value="Submit" name="btn">
    </form>
    <a href="register.php">don't have register yet ? Click here !</a>
</body>
</html>