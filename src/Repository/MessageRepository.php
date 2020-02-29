<?php

namespace App\Repository;

use App\Entity\Message;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Message|null find($id, $lockMode = null, $lockVersion = null)
 * @method Message|null findOneBy(array $criteria, array $orderBy = null)
 * @method Message[]    findAll()
 * @method Message[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function getAllMessagesFromConversation($idUser, $idCurrentUser)
    {
        $qb = $this->createQueryBuilder('m')
                    ->where('m.receiver = :idUser AND m.sender = :idCurrent')
                    ->orWhere('m.receiver = :idCurrent AND m.sender = :idUser')
                    ->setParameter('idUser', $idUser)
                    ->setParameter('idCurrent', $idCurrentUser)
                    ->orderBy('m.createdAt', 'ASC');
        ;

        return $qb->getQuery()->execute();
    }

    public function setReaded($idUser, $idCurrentUser)
    {
        $qb = $this->createQueryBuilder('m')
                    ->update()
                    ->set('m.readed', 'true')
                    ->where('m.receiver = :user')
                    ->andWhere('m.sender = :otherUser')
                    ->setParameter('user', $idCurrentUser)
                    ->setParameter('otherUser', $idUser)
        ;

        return $qb->getQuery()->execute();
    }

    public function getConversations($idUser, ?int $limit = null)
    {
        $sub = $this->_em->createQueryBuilder()
            ->select('m2.id')
            ->from(Message::class, 'm2')
            ->join('m2.receiver', 'r2')
            ->join('m2.sender', 's2')
            ->where('s2.id = :idUser')
            ->getDQL()
        ;

        $sub2 = $this->_em->createQueryBuilder()
            ->select('m3.id')
            ->from(Message::class, 'm3')
            ->join('m3.receiver', 'r3')
            ->join('m3.sender', 's3')
            ->where('r3.id = :idUser')
            ->getDQL()
        ;


        $qb = $this->_em->createQueryBuilder()
                    ->select('u')
                    ->from(User::class, 'u')
                    ->leftJoin('u.receivedMessages', 'r')
                    ->leftJoin('u.sentMessages', 's')
        ;

        if($limit !== null) {
            $qb->setMaxResults($limit);
        }

        $qb->where($qb->expr()->in(
                'r.id',
                $sub
            ))
            ->orWhere($qb->expr()->in(
                's.id',
                $sub2
            ))
            ->andWhere('u.isDisabled = false')
            ->setParameter('idUser', $idUser)
            ->groupBy('u.id')
        ;

        return $qb->getQuery()->execute();
    }

    // /**
    //  * @return Message[] Returns an array of Message objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Message
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
