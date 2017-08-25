<?php


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Wallpaper;

class LoadWallpaperFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $wallpaper = (new Wallpaper())
            ->setFilename('ds-dark-souls-2-gameplay-wallpaper-2.jpg')
            ->setSlug('ds-dark-souls-2-gameplay-wallpaper-2')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.darksouls')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('ds-Dark-Souls-3-1080-Wallpaper-3.jpg')
            ->setSlug('ds-Dark-Souls-3-1080-Wallpaper-3')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.darksouls')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('ds-dark-souls-3-throne-fextralife.jpg')
            ->setSlug('ds-dark-souls-3-throne-fextralife')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.darksouls')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('ds-darksouls3-cover.jpg')
            ->setSlug('ds-darksouls3-cover')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.darksouls')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('ds-Irithyll.jpg')
            ->setSlug('ds-Irithyll')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.darksouls')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('ds-Irithyll_of_the_Boreal_Valley_-_10.jpg')
            ->setSlug('ds-Irithyll_of_the_Boreal_Valley_-_10')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.darksouls')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('mg-7_Metal-Gear-Solid-V-The-Phantom-Pain.jpg')
            ->setSlug('mg-7_Metal-Gear-Solid-V-The-Phantom-Pain')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.metalgear')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('mg-338188-metal-gear-rising.jpg')
            ->setSlug('mg-338188-metal-gear-rising')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.metalgear')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('mg-maxresdefault.jpg')
            ->setSlug('mg-maxresdefault')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.metalgear')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('mg-MGSV_TTP_child_soldiers.jpg')
            ->setSlug('mg-MGSV_TTP_child_soldiers')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.metalgear')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('mg-RmXkdvP.png')
            ->setSlug('mg-RmXkdvP')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.metalgear')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('mg-stpp_e3_2015_03.0.jpg')
            ->setSlug('mg-stpp_e3_2015_03.0')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.metalgear')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('wc-c64213e782b6a.jpg')
            ->setSlug('wc-c64213e782b6a')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.warcraft')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('wc-cZGBwrZ.jpg')
            ->setSlug('wc-cZGBwrZ')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.warcraft')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
        ->setFilename('wc-s7se5uyh4y.jpg')
        ->setSlug('wc-s7se5uyh4y')
        ->setWidth(1920)
        ->setHeight(1080)
        ->setCategory(
            $this->getReference('category.warcraft')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('wc-UnGoro-Wallpaper.jpg')
            ->setSlug('wc-UnGoro-Wallpaper')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.warcraft')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('wc-wallup-7983.jpg')
            ->setSlug('wc-wallup-7983')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.warcraft')
            );
        $manager->persist($wallpaper);
        $wallpaper = (new Wallpaper())
            ->setFilename('wc-wow_illidan_castle.jpg')
            ->setSlug('wc-wow_illidan_castle')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.warcraft')
            );
        $manager->persist($wallpaper);


        $manager->flush();
    }

    public function getOrder()
    {
       return 200;
    }
}
