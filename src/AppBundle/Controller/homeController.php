<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class homeController extends Controller
{

    public function index()
    {
        $advert = array(
            'title'   => 'Recherche développpeur Symfony',
            'author'  => 'Alexandre',
            'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
            'date'    => new \Datetime()
        );

        return $this->render('AppBundle:home:index.html.twig', array(
            'advert' => $advert
       ));
    }
}
