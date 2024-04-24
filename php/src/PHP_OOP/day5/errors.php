<?php
/*
Errors : 
An error is an unexpected result that can't be handled by the program itself.
Errors are fixed directly by the developer

*/

function custom_error($errno, $errstr){
    echo "Something is wrong.<br>";
    echo "Error code : $errno<br>";
    echo "Error message : $errstr<br>";
}

set_error_handler("custom_error");
echo $string;