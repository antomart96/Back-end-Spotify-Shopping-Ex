<?php

require_once "LivingBeing.php";
require_once 'IWorker.php';


class Human extends LivingBeing implements IWorker
{
    public function communicate()
    {
        echo "Hey, my name is " . $this->name . "<br>";
    }

    public function work()
    {
        $random = rand(1, 4);
        if($random == 1){
            throw new Exception("$this->name is injured");
        }else{
            echo "$this->name is working a lot !!<br>";
        }
    }
}