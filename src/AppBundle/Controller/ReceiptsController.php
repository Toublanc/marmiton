<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ReceiptsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReceiptsController extends Controller
{
    public function addAction(Request $request)
    {
        $form = $this->createForm(ReceiptsType::class, null, ['csrf_protection' => false]);
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