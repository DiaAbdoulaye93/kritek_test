<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Entity\InvoiceLine;
use App\Form\InvoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class InvoiceController extends AbstractController
{
    #[Route('/invoice', name: 'app_invoice')]
    public function index(Request $request, ManagerRegistry $manageRegistery): Response
    {

        $invoice = new Invoice();
        $invoiceLines = new InvoiceLine();
        $invoice->getInvoiceLines()->add($invoiceLines);
        $entityManager = $manageRegistery->getManager();
        $invoice->getInvoiceLines()->add($invoiceLines);
        $form = $this->createForm(InvoiceType::class, $invoice);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dd($invoice);
        }
        dd('ok');
        return $this->render('invoice/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
