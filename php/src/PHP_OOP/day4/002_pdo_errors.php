<?php

/*
    PDO got 3 error mode.
    According to argument, it will display, or not errors return by our DB :

    PDO::ERRMODE_SILENT
    Default value. PDO displays nothing.
    You have to check yourself content of 
    $pdo->errorInfo();

    PDO::ERRMODE_WARNING
        Display PHP Warnings

    PDO::ERRMODE_EXCEPTION
        Use exception

*/

$pdo = new PDO(xxxxxxxxxxxxxxxxx);
$do->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);