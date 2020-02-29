<?php

namespace App\Repository;

use App\Entity\TeamUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TeamUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamUsers[]    findAll()
 * @method TeamUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamUsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeamUsers::class);
    }

    // /**
    //  * @return TeamUsers[] Returns an array of TeamUsers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TeamUsers
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
