<?php

// /src/AppBundle/Controller/HomeController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $darksouls = [
            'ds-Dark-Souls-3-1080-Wallpaper-3.jpg',
            'ds-Irithyll.jpg',
            'ds-Irithyll_of_the_Boreal_Valley_-_10.jpg',
            'ds-dark-souls-2-gameplay-wallpaper-2.jpg',
            'ds-dark-souls-3-throne-fextralife.jpg',
            'ds-darksouls3-cover.jpg',
        ];

        $mgs = [
            'mg-338188-metal-gear-rising.jpg',
            'mg-7_Metal-Gear-Solid-V-The-Phantom-Pain.jpg',
            'mg-MGSV_TTP_child_soldiers.jpg',
            'mg-maxresdefault.jpg',
            'mg-RmXkdvP.png',
            'mg-stpp_e3_2015_03.0.jpg',
        ];

        $warcraft = [
            'wc-UnGoro-Wallpaper.jpg',
            'wc-c64213e782b6a.jpg',
            'wc-cZGBwrZ.jpg',
            'wc-s7se5uyh4y.jpg',
            'wc-wallup-7983.jpg',
            'wc-wow_illidan_castle.jpg',
        ];
        $images = array_merge($darksouls, $mgs, $warcraft );

        shuffle($images);

        $randomisedImages = array_slice($images, 0, 8);
        return $this->render('home/index.html.twig', [
            'random' => $randomisedImages,
            'ds'            => array_slice($darksouls, 0, 2),
            'mg'            => array_slice($mgs, 0, 2),
            'wc'          => array_slice($warcraft, 0, 2),
        ]);
    }
}
