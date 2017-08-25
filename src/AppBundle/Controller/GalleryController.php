<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GalleryController extends Controller
{
    /**
     * @Route("/gallery", name="gallery")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $images = [
            'ds-Dark-Souls-3-1080-Wallpaper-3.jpg',
            'ds-Irithyll.jpg',
            'ds-Irithyll_of_the_Boreal_Valley_-_10.jpg',
            'ds-dark-souls-2-gameplay-wallpaper-2.jpg',
            'ds-dark-souls-3-throne-fextralife.jpg',
            'ds-darksouls3-cover.jpg',
            'mg-338188-metal-gear-rising.jpg',
            'mg-7_Metal-Gear-Solid-V-The-Phantom-Pain.jpg',
            'mg-MGSV_TTP_child_soldiers.jpg',
            'mg-maxresdefault.jpg',
            'mg-RmXkdvP.png',
            'mg-stpp_e3_2015_03.0.jpg',
            'wc-UnGoro-Wallpaper.jpg',
            'wc-c64213e782b6a.jpg',
            'wc-cZGBwrZ.jpg',
            'wc-s7se5uyh4y.jpg',
            'wc-wallup-7983.jpg',
            'wc-wow_illidan_castle.jpg',
        ];

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $images, /* array of images */
            $request->query->getInt('page', 1), /*current page number*/
            6 /*images per page*/
        );
        return $this->render('gallery/index.html.twig', [
            'images' => $pagination
        ]);
    }
}
