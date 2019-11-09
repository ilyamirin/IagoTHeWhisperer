<?php

namespace App\Entity;

use App\Object\RangeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CheckRangeRepository")
 */
class CheckRange implements RangeInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $min;

    /**
     * @ORM\Column(type="float", nullable=true)
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

    public function getMin(): ?float
    {
        return $this->min;
    }

    public function setMin(?float $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function getMax(): ?float
    {
        return $this->max;
    }

    public function setMax(?float $max): self
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
