<?php

namespace App\Repository;

use App\Entity\InfosPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method InfosPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfosPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfosPlayer[]    findAll()
 * @method InfosPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfosPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfosPlayer::class);
    }

    // /**
    //  * @return InfosPlayer[] Returns an array of InfosPlayer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfosPlayer
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
