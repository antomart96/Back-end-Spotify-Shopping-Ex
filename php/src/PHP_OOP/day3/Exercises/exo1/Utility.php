<?php

class Utility{
    public static function Log(){
        date_default_timezone_set('Europe/Luxembourg');
        file_put_contents('utility.log',  date('l jS \of F Y h:i:s A ') . "- Accessing file\r",FILE_APPEND);
    }
}