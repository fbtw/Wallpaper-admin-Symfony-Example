<?php
namespace AppBundle\Service;



class WallpaperFilePathHelper
{

    public function __construct(string $wallpaperFileDirectory)
    {
        $this->wallpaperFileDirectory = $this
            ->ensureHasTrailingSlash(
                $wallpaperFileDirectory
            )
        ;
    }
    public function getNewFilePath(string $newFilePath)
    {
        $newFilePath = $this->ensureHasNoLeadingSlash($newFilePath);

        return $this->wallpaperFileDirectory . $newFilePath;
    }

    private function ensureHasTrailingSlash(string $path)
    {
        if (substr($path, -1) === '/') {
            return $path;
        }

        return $path. '/';
    }

    private function ensureHasNoLeadingSlash(string $path)
    {
        if (substr($path, 0, 1) === '/') {
            return substr($path, 1);
        }

        return $path;
    }
}