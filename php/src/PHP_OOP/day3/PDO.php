<?php

// DSN = Data Source Name
// It's used to specify the type of DB, it's name and also the host
$dsn = "mysql:host=db;dbname=test_db";

// Then we create a new object using the PDO class
// Using it's methods we will send our SQL queries to the server
$pdo = new PDO($dsn, 'root', 'root');

$query = 'DELETE FROM table1 WHERE id=1;';
// exec() sends the query to the server and returns the amount of rows that have been modified
$result = $pdo->exec($query);
echo "Number of rows deleted : $result<br>";


$query = "SELECT * FROM table1";
// query() returns the data that we SELECT, or nothing if the operation is INSERT, UPDATE or DELETE
$stmt = $pdo->query($query);

// we have to fetch our data before using it
// fetch() = get next row / fetchAll() = get all rows
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($results);



// Prepared statements
$prep = $pdo->prepare("SELECT * FROM table1 WHERE id = ?");

// bindValue() need the value to replace the placeholder
// $prep->bindValue(1, 2);

// but bindParam() can use a variable (even undefined) and use it's value when the query will be sent to the server
$prep->bindParam(1, $id, PDO::PARAM_INT);

$id = 2;
// to run the prepared statement, we use execute()
$prep->execute();

$results = $prep->fetchAll(PDO::FETCH_ASSOC);
echo "<br><hr>";
print_r($results);


// Now let's see named placeholders
$prep = $pdo->prepare("SELECT * FROM table1 WHERE id = :id");

$prep->bindParam(":id", $id);
$id = 3;
$prep->execute();
$results = $prep->fetchAll(PDO::FETCH_ASSOC);
echo "<br><hr>";
print_r($results);

// Close the connection to the DB
$pdo = null;



