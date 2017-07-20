<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Receipts;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NewController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render('new/new.html.twig', [

        ]);
    }


}
