<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredients;
use AppBundle\Entity\Receipts;
use AppBundle\Form\Type\ReceiptsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReceiptsController extends Controller
{
    public function addAction(Request $request)
    {
        $receipts = new Receipts();
        $receipts->addIngredient(new Ingredients());
        $form = $this->createForm(ReceiptsType::class, $receipts, ['csrf_protection' => false]);
        if ($request->isMethod('POST')) {
            $data = $request->get('Receipts');
            var_dump($data);
            $form->handleRequest($request);
        }

        return $this->render('receipts/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}