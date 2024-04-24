<?php

require_once "TableManager.php";
require_once "User.php";

class UserTable extends TableManager{
    private $pdo;

    public function __construct(){
        $this->pdo = $this->getPdo();
    }

    public function addUser($first_name, $last_name, $mail, $password){
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO USERS (first_name, last_name, mail, password) VALUES (:first_name, :last_name, :mail, :password)");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':mail',$mail);
        $stmt->bindParam(':password',$password);
        if($stmt->execute()){
            echo "add successfully";
        }else{
            echo " something wrong ";
        }
        $this->pdo= null;
    }

    public function getUser($mail){
        $stmt = $this->pdo->prepare("SELECT * FROM USERS WHERE mail = :mail");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->pdo = null;
        return $results;
    }

    public function authenticate($dataArray)
    {
        $user = $this->getUser($dataArray['mail']);
        if($user){
            if(password_verify($dataArray['password'], $user['password'])){
                $_SESSION['user'] = $user;
                return "Login Succesfull!";
            }
        }else{
            return "Email or passowrd incorrect";
        }
    }

    public function getSong(){
        $stmt = $this->pdo->prepare("SELECT * FROM SONGS");
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->pdo = null;
        return $results;
    }
}

