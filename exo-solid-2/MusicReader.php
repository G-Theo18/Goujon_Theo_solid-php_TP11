<?php

require_once 'MusicFactory.php';

class MusicReader
{
    private Music $music;

    public function __construct(string $filename)
    {
        $this->music = MusicFactory::create($filename);
    }

    public function listen()
    {
        return $this->music->listen();
    }
}
