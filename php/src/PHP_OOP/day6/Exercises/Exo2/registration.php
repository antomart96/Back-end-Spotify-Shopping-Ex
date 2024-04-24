<?php
session_start();
require_once "UserTable.php";

    if(isset($_POST['btn'])){
        $first_name = strip_tags(trim($_POST['first_name']));
        $last_name = strip_tags(trim($_POST['last_name']));
        $newEmail = strip_tags(trim($_POST['mail']));
        $mail = filter_var($newEmail, FILTER_SANITIZE_EMAIL);
        $password = strip_tags(trim($_POST['password']));
        $confirmPassword = strip_tags(trim($_POST['passwordConf']));
        
        $errors = [];
        if (empty($first_name)){
            $errors['first_name'] = "First Name is required ! <br>";
        }
        if (empty($last_name)){
            $errors['last_name'] = "Last Name is required ! <br>";
        }
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Not a valdi email address ! <br>";
        }
        if(empty($password)){
            $errors['password'] = "Password is required ! <br>";
        }
        if($password !== $confirmPassword)
        {
            $errors['confirm'] = "Password and confirm missmatch! <br>";
        }

        if($errors){
            foreach($errors as $error){
                echo $error;
            }
        }else{
            $userTable =new UserTable();
            $userTable->addUser($first_name, $last_name, $mail, $_POST['password']);
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
    <form  method="POST">
        <label for="first_name">First Name : : </label>
        <input type="text" name="first_name" id="first_name" placeholder="First Name"><br>
        <label for="last_name">Last Name : </label>
        <input type="text" name="last_name" id="last_name" placeholder="Last Name"><br>
        <label for="mail">Mail : </label>
        <input type="email" name="mail" id="mail" placeholder="email@hotmail.com"><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <label for="passwordConf">Password Confirmation : </label>
        <input type="password" name="passwordConf" id="passwordConf" placeholder="Password Confirmation"><br>
        <input type="submit" value="Register" name="btn"><br>
    </form>


</body>
</html>