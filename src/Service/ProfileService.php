<?php

namespace App\Service;

use App\Adapter\AbstractBaseAdapter;
use App\Entity\Bank;
use App\Entity\Tariff;
use App\Model\Profile;
use App\Model\TariffResult;
use App\Repository\TariffRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ProfileService
{
    /**
     * @var TariffRepository
     */
    protected $tariffRepository;

    /** @var AbstractBaseAdapter[] */
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
        $bankIds = $profile->getBanks()->map(function(Bank $bank) {
            return $bank->getId();
        })->toArray();

        /** @var Tariff[] $tariffs */
        $tariffs = new ArrayCollection($this->tariffRepository->findAll());

        $tariffs = $tariffs->filter(function(Tariff $tariff) use ($bankIds) {
            return in_array($tariff->getBank()->getId(), $bankIds);
        });

        $tariffsResult = [];
        foreach ($tariffs as $tariff) {
            $tariffsResult[$tariff->getBank()->getId()][] =
                $this->adapters[$tariff->getAdapter()]->calculate($tariff, $profile);
        }

        return $this->filter($tariffsResult);
    }

    /**
     * @param $tariffs
     * @return TariffResult[]
     */
    public function filter(array $tariffs): array
    {
        if (0 === count($tariffs)) {
            return [[], []];
        }

        $result = [];

        /** @var TariffResult[]  $bank */
        foreach ($tariffs as $bank) {
            $result[] = array_reduce($bank, function($a, $b) {
                /** @var TariffResult $a */
                /** @var TariffResult $b */
                return null !== $a && $a->getCost() <= $b->getCost() ? $a : $b;
            });
        }

        usort($result, function ($a, $b) {
            /** @var TariffResult $a */
            /** @var TariffResult $b */
            return $a->getCost() <=> $b->getCost();
        });

        return $result;
    }
}
