<?php

namespace App\Repository;

use App\Entity\LignePromotion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LignePromotion|null find($id, $lockMode = null, $lockVersion = null)
 * @method LignePromotion|null findOneBy(array $criteria, array $orderBy = null)
 * @method LignePromotion[]    findAll()
 * @method LignePromotion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignePromotionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LignePromotion::class);
    }

    // /**
    //  * @return LignePromotion[] Returns an array of LignePromotion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LignePromotion
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
