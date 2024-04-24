<?php

//Calling the database
abstract class TableManager{
    protected function getPdo(){
        return new PDO ('mysql:host=db;dbname=user_db', 'root', 'root');
    }
}