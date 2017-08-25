<?php

namespace AppBundle\File;

use AppBundle\Model\FileInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class SymfonyUploadedFile implements FileInterface
{
    /**
     * @var $uploadedFile UploadedFile
     */
    private $file;

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     * @return SymfonyUploadedFile
     */
    public function setFile($file)
    {
        $this->file = $file;
    }


    public function getPathName()
    {
        return $this->file->getPathname();
    }

    public function getFileName()
    {
        return $this->file->getClientOriginalName();
    }


}
