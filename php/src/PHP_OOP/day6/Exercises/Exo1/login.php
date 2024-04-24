<?php
session_start();
require_once "UserTable.php";

    if(isset($_POST['btn'])){ 

        $user = new UserTable();
        echo $user->authenticate($_POST);
    
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
    <form  method="POST">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" placeholder="email@hotmail.com"><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <input type="submit" value="Log in" name="btn"><br>
    </form>


</body>
</html>