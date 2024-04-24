<?php

class ArtistsTable extends TableManager{
    private $pdo;

    public function __construct(){
        $this->pdo = $this->getPdo();
    }

    public function getSong(){
        $stmt = $this->pdo->prepare("SELECT * FROM SONGS");
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->pdo = null;
        return $results;
    }
}