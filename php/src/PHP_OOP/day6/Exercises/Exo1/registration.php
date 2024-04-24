<?php
session_start();
require_once "UserTable.php";

    if(isset($_POST['btn'])){
        $name = strip_tags(trim($_POST['name']));
        $newEmail = strip_tags(trim($_POST['email']));
        $email = filter_var($newEmail, FILTER_SANITIZE_EMAIL);
        $country = strip_tags(trim($_POST['country']));
        $password = strip_tags(trim($_POST['password']));
        $confirmPassword = strip_tags(trim($_POST['passwordConf']));
        
        $errors = [];
        if (empty($name)){
            $errors['name'] = "Name is required ! <br>";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
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
            $userTable->addUser($name, $email, $hashedPassword, $_POST['age'], $country);
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
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" placeholder="name"><br>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" placeholder="email@hotmail.com"><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <label for="passwordConf">Password Confirmation : </label>
        <input type="password" name="passwordConf" id="passwordConf" placeholder="Password Confirmation"><br>
        <label for="number">Age : </label>
        <input type="number" name="age" id="number" placeholder="Age"><br>
        <label for="country">Country : </label>
        <input type="text" name="country" id="country" placeholder="Country"><br>
        <input type="submit" value="Register" name="btn"><br>
    </form>


</body>
</html>