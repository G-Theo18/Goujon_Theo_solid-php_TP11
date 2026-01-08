<?php

require_once 'FileInformation.php';
require_once 'ExtensionDetector.php';
require_once 'ImageResizer.php';

class Uploader
{
    private $name;
    private $type;
    private $temporaryName;

    public $directory = '';
    public $error = '';

    public function __construct($file)
    {
        $fileData = $_FILES[$file];
        $this->temporaryName = $fileData['tmp_name'];
        $this->name = $fileData['name'];
        $this->type = $fileData['type'];
    }

    /**
     * Vérifier si le type MIME est valide avec ExtensionDetector
     */
    public function uploadFile()
    {
        $extensionDetector = new ExtensionDetector();
        $extension = $this->getExtension();

        if (!$extensionDetector->isValidType($extension)) {
            $this->error = 'Le fichier ' . $this->name . ' n\'est pas d\'un type valide';
            return false;
        }

        return true;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * Récupérer l’extension avec FileInformation
     */
    public function getExtension()
    {
        $fileInformation = new FileInformation();
        return $fileInformation->getExtension($this->name);
    }

    /**
     * Redimensionner l’image avec ImageResizer
    */
    public function resize($origin, $destination, $width, $maxHeight)
    {
        $resizer = new ImageResizer();
        $extension = $this->getExtension();

        return $resizer->resize(
            $extension,
            $origin,
            $destination,
            $width,
            $maxHeight
        );
    }
}
