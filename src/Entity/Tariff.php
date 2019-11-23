<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var ReceptionRange[]
     * @ORM\OneToMany(targetEntity="ReceptionRange", mappedBy="tariff", cascade={"all"}, orphanRemoval=true)
     */
    private $receptionRanges;

    /**
     * @var ExtraditionRange[]
     * @ORM\OneToMany(targetEntity="ExtraditionRange", mappedBy="tariff", cascade={"all"}, orphanRemoval=true)
     */
    private $extraditionRanges;

    /**
     * @ORM\Column(type="integer")
     */
    private $freeErrandsAmount;

    /**
     * @ORM\Column(type="float")
     */
    private $errandCost;

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
        $this->receptionRanges = new ArrayCollection();
        $this->extraditionRanges = new ArrayCollection();
        $this->transferRanges = new ArrayCollection();
        $this->checkRanges = new ArrayCollection();
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

    /** @return Collection|ReceptionRange[] */
    public function getReceptionRanges(): Collection
    {
        return $this->receptionRanges;
    }

    public function setReceptionRanges(Collection $receptionRanges): self
    {
        foreach ($receptionRanges as $receptionRange) {
            $this->addReceptionRange($receptionRange);
        }

        return $this;
    }

    public function addReceptionRange(ReceptionRange $receptionRange): self
    {
        $receptionRange->setTariff($this);
        $this->receptionRanges->add($receptionRange);

        return $this;
    }

    public function removeReceptionRange(ReceptionRange $receptionRange): self
    {
        $this->receptionRanges->removeElement($receptionRange);

        return $this;
    }

    /**
     * @return Collection|ExtraditionRange[]
     */
    public function getExtraditionRanges(): Collection
    {
        return $this->extraditionRanges;
    }

    public function setExtraditionRanges(Collection $extraditionRanges): self
    {
        foreach ($extraditionRanges as $extraditionRange) {
            $this->addExtraditionRange($extraditionRange);
        }

        return $this;
    }

    public function addExtraditionRange(ExtraditionRange $extraditionRange): self
    {
        $extraditionRange->setTariff($this);
        $this->extraditionRanges->add($extraditionRange);

        return $this;
    }

    public function removeExtraditionRange(ExtraditionRange $extraditionRange): self
    {
        $this->extraditionRanges->removeElement($extraditionRange);

        return $this;
    }

    public function getFreeErrandsAmount(): ?int
    {
        return $this->freeErrandsAmount;
    }

    public function setFreeErrandsAmount(int $freeErrandsAmount): self
    {
        $this->freeErrandsAmount = $freeErrandsAmount;

        return $this;
    }

    public function getErrandCost(): ?float
    {
        return $this->errandCost;
    }

    public function setErrandCost(float $errandCost): self
    {
        $this->errandCost = $errandCost;

        return $this;
    }

    /** @return Collection|TransferRange[] */
    public function getTransferRanges(): Collection
    {
        return $this->transferRanges;
    }

    public function setTransferRanges(Collection $transferRanges): self
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

    /**
     * @return Collection|CheckRange[]
     */
    public function getCheckRanges(): Collection
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
