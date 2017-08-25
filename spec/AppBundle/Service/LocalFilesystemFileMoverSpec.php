<?php

namespace spec\AppBundle\Service;

use AppBundle\Service\LocalFilesystemFileMover;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Filesystem\Filesystem;

class LocalFilesystemFileMoverSpec extends ObjectBehavior
{
    private $filesystem;

    function let(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        $this->beConstructedWith($filesystem);
    }
    function it_is_initializable(Filesystem $filesystem)
    {
        //$this->beConstructedWith($filesystem);
        $this->shouldHaveType(LocalFilesystemFileMover::class);
    }

    function it_can_move_a_file_from_temporary_to_controlled_storage(Filesystem $filesystem)
    {
        $this->beConstructedWith($filesystem);

        $temporaryPath = '/some/fake/temporary/path';
        $controlledPath = '/some/fake/real/path.ext';

        $this->move($temporaryPath, $controlledPath)->shouldReturn(true);

        $this->filesystem->rename($temporaryPath, $controlledPath)->shouldHaveBeenCalled();
    }

}
