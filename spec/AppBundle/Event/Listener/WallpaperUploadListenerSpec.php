<?php

namespace spec\AppBundle\Event\Listener;

use AppBundle\Event\Listener\WallpaperUploadListener;
use AppBundle\File\SymfonyUploadedFile;
use AppBundle\Service\LocalFilesystemFileMover;
use AppBundle\Entity\Category;
use AppBundle\Entity\Wallpaper;
use AppBundle\Model\FileInterface;
use AppBundle\Service\WallpaperFilePathHelper;
use AppBundle\Service\ImageFileDimensionsHelper;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;


use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class WallpaperUploadListenerSpec extends ObjectBehavior
{

    private $fileMover;
    private $wallpaperFilePathHelper;
    private $imageFileDimensionsHelper;

    function let(LocalFilesystemFileMover $fileMover,
                 WallpaperFilePathHelper $wallpaperFilePathHelper,
                 ImageFileDimensionsHelper $imageFileDimensionsHelper)
    {
        $this->beConstructedWith($fileMover, $wallpaperFilePathHelper, $imageFileDimensionsHelper);
        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
        $this->imageFileDimensionsHelper = $imageFileDimensionsHelper;
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(WallpaperUploadListener::class);
    }
    function it_returns_early_if_is_not_a_Wallpaper_instance(
        LifecycleEventArgs $eventArgs)
    {
        $eventArgs->getEntity()->willReturn(new Category());

        $this->prePersist($eventArgs)->shouldReturn(false);

        $this->fileMover->move(
            Argument::any(),
            Argument::any()
        )->shouldNotHaveBeenCalled();
    }
    function it_can_prePersist(
        LifecycleEventArgs $eventArgs,
        FileInterface $file,
        EntityManagerInterface $em,
        SymfonyUploadedFile $symfonyUploadedFile
    ){
        $fakeTempPath='/tmp/some.file';
        $fakeFilename='/path/to/my/project/some.file';

        $file->getPathName()->willReturn($fakeTempPath);
        $file->getFileName()->willReturn($fakeFilename);


        $wallpaper = new Wallpaper();
        $wallpaper->setFile($file->getWrappedObject());

        $eventArgs->getEntity()->willReturn($wallpaper);

        $fakeNewFilePath = '/some/new/fake/' . $fakeFilename;

        $this->wallpaperFilePathHelper->getNewFilePath($fakeFilename)->willReturn($fakeNewFilePath);

        $this->imageFileDimensionsHelper->setImageFilePath($fakeNewFilePath)->shouldBeCalled();
        $this->imageFileDimensionsHelper->getWidth()->willReturn(1024);
        $this->imageFileDimensionsHelper->getHeight()->willReturn(768);

        $outcome = $this->prePersist($eventArgs);

        $this->fileMover->move($fakeTempPath, $fakeNewFilePath)->shouldHaveBeenCalled();

        $outcome->shouldBeAnInstanceOf(Wallpaper::class);
        $outcome->getFilename()->shouldReturn($fakeFilename);
        $outcome->getWidth()->shouldReturn(1024);
        $outcome->getHeight()->shouldReturn(768);

    }

    function it_can_preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $this->preUpdate($eventArgs);
    }
}
