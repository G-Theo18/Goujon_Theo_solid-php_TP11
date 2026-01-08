<?php

require_once 'Music.php';

class Ogg implements Music
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function listen()
    {
        return 'Lecture du fichier Ogg ' . $this->filename;
    }
}
