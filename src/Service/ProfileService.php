<?php

namespace App\Service;

use App\Adapter\BaseAdapter;
use App\Entity\Tariff;
use App\Object\BankResult;
use App\Object\Profile;
use App\Object\TariffResult;
use App\Repository\TariffRepository;

class ProfileService
{
    /**
     * @var TariffRepository
     */
    protected $tariffRepository;

    /** @var BaseAdapter[] */
    protected $adapters;

    /**
     * @param TariffRepository $tariffRepository
     * @param iterable $adapters
     */
    public function __construct(TariffRepository $tariffRepository, iterable $adapters)
    {
        $this->tariffRepository = $tariffRepository;
        /** @var \Traversable $adapters */
        $this->adapters = iterator_to_array($adapters);
    }

    /**
     * @param Profile $profile
     * @return array
     */
    public function getResult(Profile $profile): array
    {
        /** @var Tariff[] $tariffs */
        $tariffs = $this->tariffRepository->findAll();

        $tariffsResult = [];
        foreach ($tariffs as $tariff) {
            $adapter = $this->adapters[$tariff->getAdapter()];
            $tariffsResult[] = new TariffResult(
                $tariff,
                $adapter->calculateReception($profile->getReception()),
                $adapter->calculateExtradition($profile->getExtradition()),
                $adapter->calculateErrands($profile->getErrands()),
                $adapter->calculateTransfers($tariff->getTransferRanges(), $profile->getTransfers())
            );
        }

        return $this->sortByBank($tariffsResult);
    }

    /**
     * @param TariffResult[] $tariffs
     * @return array
     */
    public function sortByBank(array $tariffs)
    {
        if (0 === count($tariffs)) {
            return [[], []];
        }

        usort($tariffs, function ($a, $b) {
            /** @var TariffResult $a */
            /** @var TariffResult $b */
            return $a->getTariff()->getBank()->getId() <=> $b->getTariff()->getBank()->getId();
        });

        $bankName= $tariffs[0]->getTariff()->getBank()->getName();
        /** @var BankResult[] $banks */
        $banks = [new BankResult($bankName)];

        /** @var TariffResult $tariff */
        foreach ($tariffs as $tariff) {
            if ($bankName !== $tariff->getTariff()->getBank()->getName()) {
                $bankName = $tariff->getTariff()->getBank()->getName();
                $banks[] = new BankResult($bankName, 1);
            } else {
                $banks[count($banks) - 1]->incCountTariffs();
            }
        }

        return [$banks, $tariffs];
    }
}
