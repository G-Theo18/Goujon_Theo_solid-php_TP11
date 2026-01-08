<?php

require_once 'MusicType.php';

class Ogg extends MusicType
{
    public function listen()
    {
        $extension = $this->getExtension();

        if ($extension !== 'ogg') {
            throw new InvalidExtensionException(
                "Fichier Ogg attendu mais '$extension' obtenu"
            );
        }

        return 'Lecture du fichier Ogg ' . $this->filename;
    }
}
