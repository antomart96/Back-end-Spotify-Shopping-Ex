<?php

class Song
{
    private $id;
    public $title;
    public $release_date;
    private $artist_id;
    public $path;

    public function getTitle()
    {
        return $this->title;
    }

    public function __toString()
    {
        return "Title : $this->title<br>Realease date : $this->release_date<br>";
    }
}
