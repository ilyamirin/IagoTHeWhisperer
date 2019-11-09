<?php

namespace App\Repository;

use App\Entity\CheckRange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CheckRange|null find($id, $lockMode = null, $lockVersion = null)
 * @method CheckRange|null findOneBy(array $criteria, array $orderBy = null)
 * @method CheckRange[]    findAll()
 * @method CheckRange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheckRangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheckRange::class);
    }

    // /**
    //  * @return CheckRange[] Returns an array of CheckRange objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CheckRange
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
