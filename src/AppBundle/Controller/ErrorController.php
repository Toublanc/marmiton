<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredients;
use AppBundle\Entity\Stage;
use AppBundle\Entity\Receipts;
use AppBundle\Form\Type\ReceiptsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class ErrorController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render('error/error.html.twig', []);
    }
}