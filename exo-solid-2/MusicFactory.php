<?php

require_once 'Music.php';
require_once 'Mp3.php';
require_once 'Ogg.php';

class MusicFactory
{
    public static function create(string $filename): Music
    {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        return match ($extension) {
            'mp3' => new Mp3($filename),
            'ogg' => new Ogg($filename),
            default => throw new Exception("Format non supporté : $extension"),
        };
    }
}
