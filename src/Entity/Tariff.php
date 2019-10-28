<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TariffRepository")
 */
class Tariff
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $cost;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $freeService;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $yearService;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $adapter;

    /**
     * @ORM\ManyToOne(targetEntity="Bank", inversedBy="tariffs")
     * @ORM\JoinColumn(name="bank_id", referencedColumnName="id")
     */
    private $bank;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getFreeService(): ?string
    {
        return $this->freeService;
    }

    public function setFreeService(string $freeService): self
    {
        $this->freeService = $freeService;

        return $this;
    }

    public function getYearService(): ?string
    {
        return $this->yearService;
    }

    public function setYearService(string $yearService): self
    {
        $this->yearService = $yearService;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAdapter(): ?string
    {
        return $this->adapter;
    }

    public function setAdapter(string $adapter): self
    {
        $this->adapter = $adapter;

        return $this;
    }

    public function getBank(): ?Bank
    {
        return $this->bank;
    }

    public function setBank(?Bank $bank): self
    {
        $this->bank = $bank;

        return $this;
    }
}
