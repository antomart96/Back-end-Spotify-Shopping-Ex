<?php
class HtmlString {
    public $string;

    public function __construct($string){
        $this->setString($string);
    }

    //setter
    public function setString(string $newString){
        if (is_string($newString)) {
             $this->string = $newString;
        }else {
            echo "Argument must be a String";
        }
    }
    
    //getters
    public function getString(){
        return $this->string;
    }
    public function getBoldString(){
        return "<strong> $this->string  </strong>";
    }
    public function getItalicString(){
        return "<em>$this->string </em>";
    }
    public function getItalicBoldString(){
        return "<em><strong> $this->string </strong></em>";
    }
}