<?php

namespace AppBundle\Service;
use Symfony\Component\Filesystem\Filesystem;

class LocalFilesystemFileMover implements FileMover
{

    /**
     * @var Filesystem
     */
    private $fileSystem;

    public function __construct(Filesystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    public function move($existingFilePath, $newFilePath)
    {
        $this->fileSystem->rename($existingFilePath, $newFilePath);
        return true;
    }
}
