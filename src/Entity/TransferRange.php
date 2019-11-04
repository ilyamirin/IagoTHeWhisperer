<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransferRangeRepository")
 */
class TransferRange
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $min;

    /**
     * @ORM\Column(type="integer")
     */
    private $max;

    /**
     * @ORM\Column(type="float")
     */
    private $value;

    /**
     * @var Tariff
     * @ORM\ManyToOne(targetEntity="Tariff", inversedBy="transferRanges")
     * @ORM\JoinColumn(name="tariff_id", referencedColumnName="id")
     */
    private $tariff;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMin(): ?int
    {
        return $this->min;
    }

    public function setMin(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(int $max): self
    {
        $this->max = $max;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getTariff(): ?Tariff
    {
        return $this->tariff;
    }

    public function setTariff(Tariff $tariff): self
    {
        $this->tariff = $tariff;

        return $this;
    }

    public function __toString()
    {
        return $this->tariff->getName() . "_{$this->min}_{$this->max}_{$this->value}";
    }
}
