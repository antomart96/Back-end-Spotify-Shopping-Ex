<?php
/*

Continue Register from Spotify exercise

- Step 1 :

Create a register.php allowing users to register through a form requiering username, 
email, password with password confirmation

- Step 2 :
Protect your input by removing white spaces and HTML tags.
Use filter_var to check the email.

- Step 3 : 

Hash the password before saving in the DB

- Step 4 :
Update your login.php to use password_verify() to log in
*/
session_start();

$db = mysqli_connect('db','root','root','spotify');
if($db){
    if (isset($_POST['btn'])) {
       
        $newUsername = strip_tags(trim($_POST['username']));
        $newEmail = strip_tags(trim($_POST['email']));
        $cleanEmail = filter_var($newEmail, FILTER_SANITIZE_EMAIL);

        if ( $_POST['password'] === $_POST['passwordConf']) {
            $hashedPassword = password_hash($_POST['password'],PASSWORD_DEFAULT);
        }else{
            echo "wrong password";
        }
        if (!empty($newUsername) && !empty($cleanEmail) && !empty($_POST['password'])) {
            $query = "INSERT INTO users (username, email, password) 
                  VALUES ('$newUsername', '$cleanEmail', '$hashedPassword')";
            $result = mysqli_query($db, $query);
 
        }else{
            echo "missing information";
        }
        date_default_timezone_set('Europe/Luxembourg');
    file_put_contents('bigBrotherWatchingYou.log', "someone register an account on ". date('l jS \of F Y h:i:s A') . "\r",FILE_APPEND);

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
    <form method="POST">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" placeholder="username"><br>
        <label for="">Email : </label>
        <input type="email" name="email" id="email" placeholder="email@hotmail.com"><br>
        <label for="">Password : </label>
        <input type="password" name="password" id="password" placeholder="password"><br>
        <label for="passwordConf">Conform Password : </label>
        <input type="password" name="passwordConf" id="passwordConf" placeholder="Password Confirmation"><br>
        <input type="submit" value="Submit" name="btn">
    </form>

    <a href="login.php">Already have an account ? Login here!</a>
</body>
</html>