<?php
/*
    It is possible to perform query (thanks to PDO) :
*/

$pdo = new PDO(/* insert your PDO here */);
$sql = 'INSERT INTO bugs (user_id, label, date)' . 'VALUES(14, "Description", "2006-6-6");';

$pdo->exec($sql);
//pdo->exec() : it will tell you that a row was successfully added

/**
 * UPDATE QUERY
 */

 $bugId = 5;
 $sql = 'UPDATE FROM bugs' . 'SET status = "resolvec"' . 'WHERE bug_id = ' . $bugId;
 $pdo->exec($sql);

 /**
  * Concatenation, in this case, is easier than prepared statement.
  *
  * Varriables are not escaped with PDO::exec()
  * PDOP::exec() retrun affected number of rows
  * Exemple:
  */
$sql = 'UPDATE FROM users ' . 'SET login = "nono452" ' .'WHERE users.id = 42 ';
$nbRows = $pdo->exec($sql);
echo 'Update number of the rows : ' . $nbRows;

/**
 * Exemple 
 */

 if($nbRows > 0 ){
    echo 'User updated';
 }else {
    echo 'No user found with this ID';
 }