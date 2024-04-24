<?php

require_once "Post.php";

$posts = Post::getAll();
if (isset($_POST['btn'])) {
    try{
        Post::createPost($_POST['title'], $_POST['content'], $_POST['user_id']);
    }catch(Exception $e){
        echo $e->getMessage();
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
    <form method="Post">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="tilte" id="title">
        <label for="content">Content</label>
        <input type="text" name="content" placeholder="content" id="content">
        <label for="user_id">User Id</label>
        <input type="number" name="user_id" placeholder="user id" id="user_id">
        <input type="submit" name="btn" value="Submit">
    </form>
    
    <?php foreach($posts as $post) : ?>
        <p><?=$post->getUser_id(); ?></p>
        <p><?=$post->title; ?></p>
        <p><?=$post->content; ?></p>
        <hr>
    <?php endforeach; ?>

</body>
</html>