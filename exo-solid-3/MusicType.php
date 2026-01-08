<?php

require_once 'MusicInterface.php';
require_once 'InvalidExtensionException.php';
require_once 'UnknownExtensionException.php';

abstract class MusicType implements MusicInterface
{
    protected string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    protected function getExtension(): string
    {
        $extension = pathinfo($this->filename, PATHINFO_EXTENSION);

        if ($extension === '' || $extension === null) {
            throw new UnknownExtensionException(
                "Aucune extension trouvée pour le fichier : {$this->filename}"
            );
        }

        return strtolower($extension);
    }

    abstract public function listen();
}
