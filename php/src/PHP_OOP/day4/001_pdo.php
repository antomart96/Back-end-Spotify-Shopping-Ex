<?php
// PDO : PHP Data OBJECT
// We're connecting usings a DSN
// http://php.net/manual/fr/ref.pdo-mysql.connection.php
// DSN = Data Source Name
// It Summerize informations regarding DB connection.

// We'll use PDO & PDOStatement classes to access database.
// PDO : Access our DB
// PDOStatement : Query we'll send

$strConnection = 'mysql:host=localhost;dbname=<<insert your DB name here>>(exemple : test_db)';

$pdo = new PDO($strConnection, 'root', 'root');

// We can now query this object:
$query = 'DELETE fROM my_table WHERE id=88;';

$pdo->exec($query);

// Prepare query
$query ='SELECT * FROM ma_table WHERE id=? AND cat=?';
$prep = $pdo->prepare($query ); // REtrun a PDOStatement

// Associate Values to palceholder (here >id=? and also here here > cat=?)
$prep->bindValue(1, 47, PDO::PARAM_INT);
$prep->bindValue(1,'categorie_1');

// Compil and execute query
$prep->execute();

// Pros of preparewd statement :
// Safer
// better perfomances

// Usefule if we want to insert multiplie line
// in the case, instead of doing multiple insert query
// we'll reuse prepared statement in a lopp

// another way 
$strConnection ='mysql:host=localhost;dbname=my_db';
$dbh = new PDO($strConnection, 'root', 'root');

$stmt = $dbh->prepare("INSERT INTO REGISTRY (name,value) VALUES (?,?)");

$stmt-> bindParam(1, $name);
$stmt->bindParam(2, $value);

// insert one record 
$name = 'one';
$value = 1;
$stmt->execute();

// insert another record
$name = 'two';
$value = 2;
$stmt->execute();