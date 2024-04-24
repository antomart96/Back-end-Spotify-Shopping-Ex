<?php

if(isset($_POST['login'])){
    header('location: login.php');
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
    <?= "Please Login in our website ! :) "; ?>
    <form method="post">
        <input type="submit" value="Login" name="login">
    </form>
</body>
</html>