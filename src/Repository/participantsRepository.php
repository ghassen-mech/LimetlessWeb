<?php

namespace App\Repository;

use App\Entity\Participants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Participants|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participants|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participants[]    findAll()
 * @method Participants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class participantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Participants::class);
    }
    public function listparticipantparformation($id){
        return $this->createQueryBuilder('p')

            ->join('p.idformation','f')
            ->addSelect('f')
            ->where('f.id=:id')
            ->setParameter('id',$id)
            ->getQuery()->getResult();
    }
    public function listpartici($id){
        $em=$this->getEntityManager();
        $query=$em->createQuery('select u from App\Entity\Utilisateur u where u.idUtilisateur IN 
        (SELECT IDENTITY(p.idclient) from App\Entity\Participants p where p.idformation=:id)')
            ->setParameter('id',$id);
        return $query->getResult();
    }


    // /**
    //  * @return Participants[] Returns an array of Participants objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Participants
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
