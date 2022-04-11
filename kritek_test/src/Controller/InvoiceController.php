<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Entity\InvoiceLine;
use App\Form\InvoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    #[Route('/invoice', name: 'app_invoice')]
    public function index(): Response
    {
     
        $invoice = new Invoice();
        $invoiceLines = new InvoiceLine();
        $invoice->getInvoiceLines()->add($invoiceLines);
        $form = $this->createForm(InvoiceType::class, $invoice);
        return $this->render('invoice/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
