<?php
session_start();

if(isset($_POST['btn'])){
    session_destroy();
    header('Location: login.php');
}

if(!isset($_SESSION['user'])){
    header('Location: login.php');
}

foreach($_SESSION['user'] as $key => $value){
    echo $key . ': ' . $value . '<br>';
}



?>

<form action="" method="post">
    <input type="submit" value="Logout" name="btn">
</form>
