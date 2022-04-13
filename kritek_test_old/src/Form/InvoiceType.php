<?php

namespace App\Form;

use App\Entity\Invoice;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormTypeInterface;
class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('invoice_date' , DateType::class, ['attr' => ['class' => 'form-control']])
            ->add('invoice_number' , NumberType::class, ['attr' => ['class' => 'form-control']])
            ->add('costumer_id' , NumberType::class, ['attr' => ['class' => 'form-control']])
            ->add('invoiceLines', CollectionType::class, [
                'entry_type' => InvoiceLineType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
