<?php

namespace App\Repository;

use App\Entity\Atelier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Atelier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Atelier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Atelier[]    findAll()
 * @method Atelier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtelierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Atelier::class);
    }

    // /**
    //  * @return Atelier[] Returns an array of Atelier objects
    // */

    /**
      * @return Atelier[] Returns an array of Formation objects
     */
    /*
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Atelier
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    /*
    public function findByClasseAge(Age $classeAge,Age $id)
    {
       $qb = $this->createQueryBuilder('atelier');
       $qb->Join('atelier.ageatelier','ag')
       ->Join('age.ageatelier','a')
       //->addSelect('ag')
       //->addSelect('a')
       ->where($qb->expr()->eq('ag.ageatelier'))
       ->andWhere($qb->expr()->eq('a.age'))
       ->andwhere('atelier.id = ?6')
       ->setParameters('ag',$classeAge)
       ->setParameters('a', $id);

       return $qb->getQuery()->getResult();
    }
    */
}
