<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredients;
use AppBundle\Entity\Stage;
use AppBundle\Entity\Receipts;
use AppBundle\Form\Type\ReceiptsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class ReceiptsController extends Controller
{
    public function addAction(Request $request)
    {
        $receipts = new Receipts();
        if ($request->getMethod() === "GET" && $request->get('id')) {
            $receipts = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Receipts')
                ->find($request->get('id'));
        }
        if ($receipts->getUser()->getId() != $this->getUser()->getId()) {
            return $this->redirect($this->generateUrl('error'));
        }
        $form = $this->createForm(ReceiptsType::class, $receipts, ['csrf_protection' => false]);
        if ($form->handleRequest($request)->isValid()) {
            var_dump($receipts);
            $em = $this->get('doctrine.orm.entity_manager');
            $receipts->setCreateAt(new \DateTime());
            $user = $this->getUser();
            $receipts->setUser($user);
            foreach ($receipts->getIngredients() as $ingredient) {
                $ingredient->setReceipts($receipts);
                $em->persist($ingredient);
            }
            $em->persist($receipts);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Recette enregistré avec success !');

            return $this->redirect($this->generateUrl('new_receipt', array('id' => $receipts->getId())));
        }

        return $this->render('receipts/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function indexAction(Request $request)
    {
        $receipts = null;
        if ($request->getMethod() === "GET") {
            $receipts = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Receipts')
                ->findAll();
        }

        return $this->render('receipts/receipts.html.twig', [
            'receipts' => $receipts
        ]);
    }

    public function readAction(Request $request)
    {
        $receipts = new Receipts();
        if ($request->getMethod() === "GET" && $request->get('id')) {
            $receipts = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Receipts')
                ->find($request->get('id'));
        }

        return $this->render('receipts/read_receipt.html.twig', [
            'receipt' => $receipts
        ]);
    }
}