<?php

namespace App\Repository;

use App\Entity\OurUniverse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OurUniverse|null find($id, $lockMode = null, $lockVersion = null)
 * @method OurUniverse|null findOneBy(array $criteria, array $orderBy = null)
 * @method OurUniverse[]    findAll()
 * @method OurUniverse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OurUniverseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OurUniverse::class);
    }

    // /**
    //  * @return OurUniverse[] Returns an array of OurUniverse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OurUniverse
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
