<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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

    public function setLocaleAction($language = null)
    {
        if($language != null)
        {
            // On enregistre la langue en session
            $this->get('session')->set('_locale', $language);
        }
        // on tente de rediriger vers la page d'origine
        $url = $this->container->get('request')->headers->get('referer');
        if(empty($url))
        {
            $url = $this->container->get('router')->generate('index');
        }
 
        return new RedirectResponse($url);
    }

}
