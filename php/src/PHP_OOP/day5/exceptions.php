<?php

/*
Errors : 
An exception is also an unexpected result, but it can handled by the script
For example: you try to open a file, but the file dosen't exist.
You can left the user choose another file Or create the missing file ...
Excepetions must be handled by the developer, and in an Object Oriented way.
When an exception is thrown (triggered), an "Exception" object is created.
Syntax : 
throw new Exception();
'new' creates an Exception object
'throw' triggers the exception
*/

class multiplyByNegativeException extends Exception{

}

function multiply ($a, $b){
    if($a < 0 or $b < 0){
        throw new multiplyByNegativeException('Negative numbers not allowed !');
    }else if(is_string($a) or is_string($b)){
        throw new Exception();
    }else{
        return $a * $b;
    }
}

try {
    echo multiply("10", -2) . "<br>";
    echo "After multiply function<br>";
} catch (multiplyByNegativeException $e) {
    echo $e->getMessage();
}catch (Exception $e) {
    echo "Something is wrong<br>";
}


