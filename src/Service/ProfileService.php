<?php

namespace App\Service;

use App\Entity\Tariff;
use App\Object\BankResult;
use App\Object\Profile;
use App\Repository\TariffRepository;

class ProfileService
{
    /**
     * @var TariffRepository
     */
    protected $tariffRepository;

    /**
     * @param TariffRepository $tariffRepository
     */
    public function __construct(TariffRepository $tariffRepository)
    {
        $this->tariffRepository = $tariffRepository;
    }

    /**
     * @param Profile $profile
     * @return array
     */
    public function getResult(Profile $profile): array
    {
        /** @var array $tariffs */
        $tariffs = $this->tariffRepository->findAll();

        if (0 === count($tariffs)) {
            return [[], []];
        }

        usort($tariffs, function ($a, $b) {
            /** @var Tariff $a */
            /** @var Tariff $b */
            return $a->getBank()->getId() <=> $b->getBank()->getId();
        });

        $bankName= $tariffs[0]->getBank()->getName();
        /** @var BankResult[] $banks */
        $banks = [new BankResult($bankName)];

        /** @var Tariff $tariff */
        foreach ($tariffs as $tariff) {
            if ($bankName !== $tariff->getBank()->getName()) {
                $bankName = $tariff->getBank()->getName();
                $banks[] = new BankResult($bankName, 1);
            } else {
                $banks[count($banks) - 1]->incCountTariffs();
            }
        }

        return [$banks, $tariffs];
    }
}
