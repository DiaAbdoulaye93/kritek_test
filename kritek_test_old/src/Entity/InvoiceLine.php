<?php

namespace App\Entity;

use App\Repository\InvoiceLineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceLineRepository::class)]
class InvoiceLine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: invoice::class, inversedBy: 'invoiceLines')]
    private $invoice;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'integer')]
    public $quantity;

    #[ORM\Column(type: 'float')]
    public $amount;

    #[ORM\Column(type: 'float')]
    public $vat_amount;

    #[ORM\Column(type: 'float' , nullable: true)]
    private $total_with_vat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoice(): ?invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getVatAmount(): ?float
    {
        return $this->vat_amount;
    }

    public function setVatAmount(float $vat_amount): self
    {
        $this->vat_amount = $vat_amount;

        return $this;
    }

    public function getTotalWithVat(): ?float
    {
        return $this->total_with_vat;
    }

    public function setTotalWithVat(float $total_with_vat): self
    {
        $this->total_with_vat = $total_with_vat;

        return $this;
    }
}
