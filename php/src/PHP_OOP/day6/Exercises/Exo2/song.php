<?php

$songs =new UserTable();
$songs->getSong();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Songs page</h1>
    <?php foreach ($songs as $song) : ?>
        <p><?=$post->getUser_id(); ?></p>
        <p><?=$post->title; ?></p>
        <p><?=$post->content; ?></p>
        <hr>
        <form action="songDetails.php" method="POST">
            <input type="hidden" name="id" value="<?=$song['id']; ?>">
            <input type="submit" value="Listen">
        </form>
        <hr>
    <?php endforeach; ?>
</body>
</html>