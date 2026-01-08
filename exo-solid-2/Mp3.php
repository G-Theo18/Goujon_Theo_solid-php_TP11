<?php

require_once 'Music.php';

class Mp3 implements Music
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function listen()
    {
        return 'Lecture du fichier Mp3 ' . $this->filename;
    }
}
