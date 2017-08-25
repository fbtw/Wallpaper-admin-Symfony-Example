<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = (new Category())
            ->setName('Dark-Souls')
        ;
        $this->addReference('category.darksouls', $category);
        $manager->persist($category);

        $category2 = (new Category())
            ->setName('Metal-Gear')
        ;
        $this->addReference('category.metalgear', $category2);
        $manager->persist($category2);

        $category3 = (new Category())
            ->setName('Warcraft')
        ;
        $this->addReference('category.warcraft', $category3);
        $manager->persist($category3);

        $manager->flush();
    }
    public function getOrder()
    {
        return 100;
    }
}
