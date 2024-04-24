<?php

class Post{
    public $title;
    public $content;
    private $id;
    private $user_id;
    
    public function getIdPost(){
        return $this->id;
    }

    public function getUser_id(){
        return $this->user_id;
    }

    private static function getPdo(){
        return new PDO("mysql:host=db;dbname=forum", "root", "root");
    }

    public static function createPost($title, $content, $user_id){
        $pdo = self::getPdo();
        $query =$pdo->prepare('INSERT INTO posts(title, content, user_id) VALUES(:title, :content, :user_id)');
        $query->bindParam(':title', $title);
        $query->bindParam(':content', $content);
        $query->bindParam(':user_id',$user_id);

        if (empty($title) || empty($content)) {
            throw new Exception("Missing information !");
        } else if(!is_numeric($user_id)){
            throw new Exception("Wrong information !");
        }else{
            $query->execute();
        }
        $pdo = null;
    }

    public static function getAll(){
        $pdo = self::getPdo();
        $query = $pdo->query('SELECT * FROM posts');
        $results = $query->fetchAll(PDO::FETCH_CLASS, 'Post');
        $pdo = null;
        return $results;
    }


}