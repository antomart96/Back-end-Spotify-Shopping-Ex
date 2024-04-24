<?php

class User{
    private $id;
    private $password;
    public $username;
    public $email;

    public function getId(){
        return $this->id;
    }
    public function getPassword(){
        return $this->password;
    }

    private static function getPdo(){
        return new PDO("mysql:host=db;dbname=forum", "root", "root");
    }

    public static function getALL(){
        $pdo = self::getPdo();
        $query =$pdo->query('SELECT * FROM users');
        $users = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        $pdo = null;
        return $users;
    }

}