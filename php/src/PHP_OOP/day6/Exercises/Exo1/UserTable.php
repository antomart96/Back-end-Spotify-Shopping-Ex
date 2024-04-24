<?php

require_once "TableManager.php";
require_once "User.php";

class UserTable extends TableManager{
    private $pdo;

    public function __construct(){
        $this->pdo = $this->getPdo();
    }

    public function addUser($name, $email, $password, $age, $country){
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password, age, country) VALUES (:name, :email, :password, :age, :country)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':age',$age);
        $stmt->bindParam(':country',$country);
        if($stmt->execute()){
            echo "add successfully";
        }else{
            echo " something wrong ";
        }
        $this->pdo= null;
    }

    public function getUser($email){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->pdo = null;
        return $results;
    }

    public function authenticate($dataArray)
    {
        $user = $this->getUser($dataArray['email']);
        if($user){
            if(password_verify($dataArray['password'], $user['password'])){
                $_SESSION['user'] = $user;
                return "Login Succesfull!";
            }
        }else{
            return "Email or passowrd incorrect";
        }
    }
}

