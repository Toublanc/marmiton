<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Receipts;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
   
        $limit = 3;
        $receipts = $this->get('doctrine.orm.entity_manager')
            ->getRepository(Receipts::class)->getReceipts($limit);
        //var_dump($receipts);
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'receipts' => $receipts
        ]);
    }


}
