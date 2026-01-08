<?php

require_once 'DatabaseInterface.php';

class JSONClient implements DatabaseInterface
{
    public function fetchAll(): array
    {
        $filePath = '/../data/users.json';

        if (!file_exists($filePath)) {
            throw new Exception("Le fichier JSON n'existe pas : $filePath");
        }

        $fileContent = file_get_contents($filePath);

        if ($fileContent === false) {
            throw new Exception("Impossible de lire le fichier JSON : $filePath");
        }

        $data = json_decode($fileContent, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Erreur lors du décodage JSON : ' . json_last_error_msg());
        }

        return $data;
    }
}
