<?php

require_once "Users.php";

class UsersTable{
    private static function getAllUsers(){
        return new PDO("mysql:host=db;name=user_db", "root", "root");
    }

    public static function getUserById($id){
        $pdo =self::getAllUsers();
        $prep = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $prep->bindValue(":id", $id);
        $prep->execute();
        $user = $prep->fetchAll(PDO::FETCH_CLASS, "Users");
        $pdo = null;
        return $user[0];
    }

    public static function addUser($name, $email, $age){
        $pdo =self::getAllUsers();
        $prep = $pdo->prepare('INSERT INTO users(name, email, age) VALUES(?, ?, ?,)');
        $prep-> bindParam(1, $name);
        $prep->bindParam(2, $email);
        $prep->bindParam(3, $age);
    }
    public static function updateUser($id, $name, $email, $age){
        $pdo =self::getAllUsers();
    }
    public static function deleteUser($id){
        $pdo =self::getAllUsers();
    }



}
