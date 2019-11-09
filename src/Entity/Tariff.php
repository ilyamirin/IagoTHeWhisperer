<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

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
     * @var TransferRange[]
     * @ORM\OneToMany(targetEntity="TransferRange", mappedBy="tariff", cascade={"all"}, orphanRemoval=true)
     */
    private $transferRanges;

    /**
     * @var CheckRange[]
     * @ORM\OneToMany(targetEntity="CheckRange", mappedBy="tariff", cascade={"all"}, orphanRemoval=true)
     */
    private $checkRanges;

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

    public function __construct()
    {
        $this->transferRanges = new ArrayCollection();
    }

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

    /** @return TransferRange[] */
    public function getTransferRanges()
    {
        return $this->transferRanges;
    }

    public function setTransferRanges($transferRanges): self
    {
        foreach ($transferRanges as $transferRange) {
            $this->addTransferRange($transferRange);
        }

        return $this;
    }

    public function addTransferRange(TransferRange $transferRange): self
    {
        $transferRange->setTariff($this);
        $this->transferRanges->add($transferRange);

        return $this;
    }

    public function removeTransferRange(TransferRange $transferRange): self
    {
        $this->transferRanges->removeElement($transferRange);

        return $this;
    }

    public function getCheckRanges()
    {
        return $this->checkRanges;
    }

    public function setCheckRanges($checkRanges): self
    {
        foreach ($checkRanges as $checkRange) {
            $this->addCheckRange($checkRange);
        }

        return $this;
    }

    public function addCheckRange(CheckRange $checkRange): self
    {
        $checkRange->setTariff($this);
        $this->checkRanges->add($checkRange);

        return $this;
    }

    public function removeCheckRange(CheckRange $checkRange): self
    {
        $this->checkRanges->removeElement($checkRange);

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

    public function __toString()
    {
        return $this->name;
    }
}
