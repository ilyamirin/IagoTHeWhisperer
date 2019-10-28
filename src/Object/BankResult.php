<?php

namespace App\Object;

class BankResult
{
    /** @var string */
    private $name;

    /** @var int */
    private $countTariffs;

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

    public function getCountTariffs(): string
    {
        return $this->countTariffs;
    }

    public function incCountTariffs()
    {
        $this->countTariffs++;
    }
}
