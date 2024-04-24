<?php
/**
*  PDO::query() looks like PDO exec(),
* but
* 
* - PDO::exec() only retrun number of rows
* affected by our SQL query
* 
* -PDO::query() retrun a rowset
* 
* we can loop this rwoset and do prepations, like display... etc
*/
$movieID = 88;
$sql='SELECT title, year FROM movies WHERE id = ' . $movieID;
$result = $pdo->query($sql);
/** 
* Query is now executed, PDO will retrun results.
* For now, results are here, but we nned to use 
* PDO_Statement::fetch() ti use them
*/
$row = $result->fetch(PDO::FETCH_ASSOC);
echo $row['title'];
echo $row['year'];
// PDO::fetch() only get the first record retrune by MYSQL.
// We need to specify fetch mode : 

// PDO::FETCH_ASSOC retrun a associative arrays.

$nextRow= $stmt->fetch(PDO::FETCH_ASSOC);
echo $row['title'];

$pdo = null;


