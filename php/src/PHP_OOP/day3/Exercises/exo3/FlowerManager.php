<?php

require_once "Flower.php";
class FlowerManager{
    
    private static function getFlower(){
        return new PDO("mysql:host=db;dbname=flower_db", 'root', 'root');
    }
    public static function findAll(){
        $pdo = self::getFlower();
        $results = $pdo->query('SELECT * FROM flowers');
        $flowers = $results->fetchAll(PDO::FETCH_CLASS, 'Flower');
        $pdo = null;
        return $flowers;

    }

    public static function find($id){
        $pdo = self::getFlower();
        $prep = $pdo->prepare("SELECT * FROM flowers WHERE id = :id");
        $prep->bindValue(':id', $id);
        $prep->execute();
        
        $flower = $prep->fetchAll(PDO::FETCH_CLASS, 'Flower');
        $pdo = null;
        return $flower[0];
    }
}