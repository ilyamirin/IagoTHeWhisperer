<?php

namespace App\Object;

class Profile
{
    /** @var int */
    // Прием на баковская карта/касса
    private $reception;

    /** @var int */
    // Выдача с банковской карты
    private $extradition;

    /** @var int */
    // Бесплатные платежные поручения
    private $errands;

    /** @var int */
    // Перевод на физическое лицо
    private $transfers;

    /** @var int */
    // Выдача по чеку
    private $check;

    /**
     * @param int|null $reception
     * @param int|null $extradition
     * @param int|null $errands
     * @param int|null $transfers
     * @param int|null $check
     */
    public function __construct(
        ?int $reception = null,
        ?int $extradition = null,
        ?int $errands = null,
        ?int $transfers = null,
        ?int $check = null
    ) {
        $this->reception = $reception;
        $this->extradition = $extradition;
        $this->errands = $errands;
        $this->transfers = $transfers;
        $this->check = $check;
    }

    /**
     * @return int|null
     */
    public function getReception(): ?int
    {
        return $this->reception;
    }

    /**
     * @param int $reception
     * @return Profile
     */
    public function setReception(?int $reception): Profile
    {
        $this->reception = $reception;
        return $this;
    }

    /**
     * @param int|null $extradition
     * @return Profile
     */
    public function setExtradition(?int $extradition): Profile
    {
        $this->extradition = $extradition;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getExtradition(): ?int
    {
        return $this->extradition;
    }

    /**
     * @param int|null $errands
     * @return Profile
     */
    public function setErrands(?int $errands): Profile
    {
        $this->errands = $errands;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getErrands(): ?int
    {
        return $this->errands;
    }

    /**
     * @param int|null $transfers
     * @return Profile
     */
    public function setTransfers(?int $transfers): Profile
    {
        $this->transfers = $transfers;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTransfers(): ?int
    {
        return $this->transfers;
    }

    /**
     * @param int|null $check
     * @return Profile
     */
    public function setCheck(?int $check): Profile
    {
        $this->check = $check;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCheck(): ?int
    {
        return $this->transfers;
    }
}
