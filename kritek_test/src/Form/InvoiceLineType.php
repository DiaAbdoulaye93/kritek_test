<?php

namespace App\Form;

use App\Entity\InvoiceLine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FloatType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceLineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('quantity', NumberType::class, ['attr' => ['class' => 'form-control']])
            ->add('amount', NumberType::class, ['attr' => ['class' => 'form-control']])
            ->add('vat_amount', NumberType::class, ['attr' => ['class' => 'form-control text-center', 'placeholder'=>'18%']])
           ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvoiceLine::class,
        ]);
    }
}
