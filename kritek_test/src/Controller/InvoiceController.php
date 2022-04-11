<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Entity\InvoiceLine;
use App\Form\InvoiceType;
use App\Repository\InvoiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class InvoiceController extends AbstractController
{
    #[Route('', name: 'app_invoice')]
    public function index(Request $request, ManagerRegistry $manageRegistery, InvoiceRepository $invoiceRepo): Response
    {

        $invoice = new Invoice();
        $invoiceLines = new InvoiceLine();
        $invoice->getInvoiceLines()->add($invoiceLines);
        $entityManager = $manageRegistery->getManager();
       
        $form = $this->createForm(InvoiceType::class, $invoice);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $invoiceLines = $invoice->getInvoiceLines();
            $entityManager->persist($invoice);
            $entityManager->flush();
            $invoice_id = $invoiceRepo->findBy(['id'=>$invoice->getId()]);
            foreach ($invoiceLines as $oneLine) {
                if ($oneLine->vat_amount > 0) {
                    $total_with_vat = $oneLine->amount * $oneLine->quantity  + ($oneLine->amount * $oneLine->quantity * $oneLine->vat_amount) / 100;
                } else {
                    $total_with_vat = $oneLine->amount * $oneLine->quantity;
                }
                $oneLine->setTotalWithVat($total_with_vat);
                $oneLine->setInvoice($invoice_id[0]);
                $entityManager->persist($oneLine);
            }
           if($entityManager->flush()){
            return $this->redirect($request->getUri());
           }
           unset($form);
           unset($invoice);
           unset($invoiceLines);
           $invoice = new Invoice();
           $line = new InvoiceLine();
           $invoice->getInvoicelines()->add($line);
           $form = $this->createForm(InvoiceType::class, $invoice);
        }
        
        return $this->render('invoice/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
