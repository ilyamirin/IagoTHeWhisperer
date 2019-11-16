<?php

namespace App\Repository;

use App\Entity\ExtraditionRange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ExtraditionRange|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtraditionRange|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtraditionRange[]    findAll()
 * @method ExtraditionRange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtraditionRangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtraditionRange::class);
    }

    // /**
    //  * @return ExtraditionRange[] Returns an array of ExtraditionRange objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExtraditionRange
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
