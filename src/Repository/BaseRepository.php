<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

abstract class BaseRepository extends ServiceEntityRepository
{
    /**
     * @param mixed $entity
     * @return $this
     * @throws \Doctrine\ORM\ORMException
     */
    public function remove($entity)
    {
        $this->getEntityManager()
            ->remove($entity);

        return $this;
    }

    /**
     * @param $entity
     * @return $this
     * @throws \Doctrine\ORM\ORMException
     */
    public function persist($entity)
    {
        $this->getEntityManager()
            ->persist($entity);

        return $this;
    }

    /**
     * @param mixed|null $entity
     * @return $this
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flush($entity = null)
    {
        $this->getEntityManager()
            ->flush($entity);

        return $this;
    }
}
