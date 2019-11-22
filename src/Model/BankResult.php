<?php

namespace App\Model;

class BankResult
{
    /** @var string */
    private $name;

    /** @var int */
    private $countTariffs;

    /**
     * @param string $name
     * @param int $countTariffs
     */
    public function __construct(string $name, int $countTariffs = 0)
    {
        $this->name = $name;
        $this->countTariffs = $countTariffs;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountTariffs(): string
    {
        return $this->countTariffs;
    }

    /**
     * @return void
     */
    public function incCountTariffs()
    {
        $this->countTariffs++;
    }
}
