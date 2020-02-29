<?php

namespace App\Repository;

use App\Entity\DiscussionImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DiscussionImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiscussionImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiscussionImages[]    findAll()
 * @method DiscussionImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscussionImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiscussionImages::class);
    }

    // /**
    //  * @return DiscussionImages[] Returns an array of DiscussionImages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiscussionImages
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
