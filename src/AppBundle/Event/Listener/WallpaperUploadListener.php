<?php

namespace AppBundle\Event\Listener;
use AppBundle\Entity\Wallpaper;
use AppBundle\Service\ImageFileDimensionsHelper;
use AppBundle\Service\LocalFilesystemFileMover;
use AppBundle\Service\WallpaperFilePathHelper;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class WallpaperUploadListener
{
    /**
     * @var LocalFilesystemFileMover
     */
    private $fileMover;

    /**
     * @var WallpaperFilePathHelper
     */
    private $wallpaperFilePathHelper;
    /**
     * @var ImageFileDimensionsHelper
     */
    private $imageFileDimensionsHelper;

    public function __construct(LocalFilesystemFileMover $fileMover,
                                WallpaperFilePathHelper $wallpaperFilePathHelper,
                                ImageFileDimensionsHelper $imageFileDimensionsHelper
    )
    {

        $this->fileMover=$fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
        $this->imageFileDimensionsHelper = $imageFileDimensionsHelper;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();
        if (false === $entity instanceof Wallpaper) {return false;}


        /**
         * @var $entity Wallpaper
         */

        $file = $entity->getFile();

        $newFilePath = $this->wallpaperFilePathHelper->getNewFilePath($file->getFilename());

        $this->fileMover->move(
            $file->getPathname(),
            $newFilePath
        );

        $this->imageFileDimensionsHelper->setImageFilePath($newFilePath);

        return $entity
            ->setFilename(
                $file->getFilename()
            )
            ->setHeight(
                $this->imageFileDimensionsHelper->getHeight()
            )
            ->setWidth(
                $this->imageFileDimensionsHelper->getWidth()
            )
            ;

        /*

        $file=$entity->getFile();

        $tempLocation= $file->getPathname();
        $newLocation= $this->wallpaperFilePathHelper->getNewFilePath(
          $file->getClientOriginalName()
        );
        $this->fileMover->move($tempLocation, $newLocation);


        $entity -> setFilename(
            $file->getClientOriginalName())
            ->setWidth($width)
            ->setHeight($height)
        ;
        */

    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
    }
}
