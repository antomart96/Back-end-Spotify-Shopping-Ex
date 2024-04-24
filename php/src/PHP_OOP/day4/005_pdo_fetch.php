<?php

/**
 * Once the PDO:: query() is called, 
 * a cursor is placed on the first record of thre rowset
 * 
 * The PDO:: fetch() function returns a recording under the cursor, and
 * if we got to the end of the table, retruns false.
 * 
 * So we can test if we arived at the end of the rowset.
 * We will have to loop on this rowset to display al the results,
 * for example:
 */

 $sql = 'SELECT title, year FROM movies;';
 $stmt = $pdo->query($sql);

 while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $row['title'] . '<br>';
    echo $row['year'];
 }

 /*
  You can also get all record in one line:
  PDO_Statement::fetchAll()
 */

 $sql ='SELECT * FROM clients';
 $stmt = $pdo->query($sql);

 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 print_r($results);

 /*
 Array $results will contain array
 We can use it as a Array
 */

 echo $results[0]['firstname'];
 