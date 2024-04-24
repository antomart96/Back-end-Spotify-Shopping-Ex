<?php

require_once "User.php";

$users = User::getALL();
// echo "<pre>";
// var_dump($users);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Users</h1>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
             <th>Email</th>
        </tr>
        <?php foreach($users as$user) : ?>
        <tr>
            <th><?= $user->getId(); ?></th>
            <th><?= $user->username; ?></th>
            <th><?= $user->email ?></th>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>