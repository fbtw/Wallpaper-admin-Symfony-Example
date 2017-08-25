<?php

// /spec/AppBundle/Service/WallpaperFilePathHelper.php

namespace spec\AppBundle\Service;

use AppBundle\Service\FileMover;
use AppBundle\Service\WallpaperFilePathHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WallpaperFilePathHelperSpec extends ObjectBehavior
{
    private $fileMover;
    private $wallpaperFilePathHelper;

    function let(FileMover $fileMover, WallpaperFilePathHelper $wallpaperFilePathHelper)
    {
        $this->beConstructedWith('/new/path/to/');
        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(WallpaperFilePathHelper::class);
    }

    function it_can_get_a_new_file_path()
    {
        $this
            ->getNewFilePath('some/file.name')
            ->shouldReturn('/new/path/to/some/file.name')
        ;
    }

    function it_gracefully_handles_no_trailing_slash_in_the_constructor_arg()
    {
        $this
            ->beConstructedWith('/whoops/no/trailing/slash')
        ;

        $this
            ->getNewFilePath('some/file.name')
            ->shouldReturn('/whoops/no/trailing/slash/some/file.name')
        ;
    }

    function it_removes_leading_slash_in_new_file_path_arg()
    {
        $this
            ->getNewFilePath('/another/file.name')
            ->shouldReturn('/new/path/to/another/file.name')
        ;
    }

    function it_throws_if_not_constructed_properly()
    {
        // reset the constructor arguments
        $this->beConstructedWith();

        $this
            ->shouldThrow()
            ->duringInstantiation()
        ;
    }

}
