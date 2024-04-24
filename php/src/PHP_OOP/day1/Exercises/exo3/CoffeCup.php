<?php

class CoffeeCup{
    private $brand;
    private $volume;
    public $quantity;
    public $temperature;

    public function __construct($brand, $volume, $temperature){
        $this->setBrand($brand);
        $this->quantity = $volume;
        $this->temperature = $temperature;
        $this->setVolume($volume);
    }

    private function setVolume($volume){
        $this->volume = $volume;
    }

    public function setBrand($brand)
    {
        if (in_array($brand, ['Malongo', 'Lavazza', 'Nescaffee'])) {
            $this->brand = $brand;
        } else {
            echo "Wrong brand!";
        }
    }

    public function getBrand(){
        return $this->brand;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function sip(int $quantity){
        $quantitySiped = $quantity;
        if (is_integer($quantity)) {
            if($this->quantity - $quantity > 0){
                $this->quantity -= $quantity;
            }else{
                $quantitySiped = $this->quantity;
                $this->quantity = 0;
            }
        }else {
            echo "Quantity is not an Integer!";
        }
        echo "You drink $quantitySiped cl. $this->quantity cl left in the cup </br>";

    }

    public function refill(){
        $this->quantity = $this->volume;
    }

    public function reheat($temperature)
    {
        $this->temperature += $temperature;
        echo "The cup is curently at $this->temperature degrees </br>";
    }

    public function coolDown($temperature)
    {
        $this->temperature -= $temperature;
        echo "The cup is curently at $this->temperature degrees </br>";
    }




}