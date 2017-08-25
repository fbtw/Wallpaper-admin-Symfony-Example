<?php

namespace AppBundle\Command;

use AppBundle\Entity\Wallpaper;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManagerInterface;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SetupWallpapersCommand extends Command
{
    /**
     * @var string
     */
    private $rootDir;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(string $rootDir, EntityManagerInterface $em)
    {
        parent::__construct();
        $this->rootDir = $rootDir;
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('app:setup-wallpapers')
            ->setDescription('Hacer entidades de fondos de pantalla')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $wallpapers = glob($this->rootDir . '/web/images/*.*');
        /*
        exit(Debug::dump($wallpapers));

 */

        $wallpaperCount = count($wallpapers);
        $io->progressStart($wallpaperCount);
        foreach ($wallpapers as $wallpaper) {

            [
                'basename' => $filename,
                'filename' => $slug,
                ]= pathinfo($wallpaper);

            [
                0 => $width,
                1 => $height,
                ] = getimagesize($wallpaper);

            $wp = (new Wallpaper())
                ->setFilename($filename)
                ->setSlug($slug)
                ->setWidth($width)
                ->setHeight($height)
            ;

            $this->em->persist($wp);
            $io -> progressAdvance();
        }
        $io -> progressFinish();
        $io->success(sprintf('Éxito! %d fondos de pantalla añadidos.', $wallpaperCount));
        $this->em->flush();

    }

}
