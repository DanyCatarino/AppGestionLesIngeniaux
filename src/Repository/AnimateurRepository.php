<?php

namespace App\Repository;

use App\Entity\Animateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Animateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animateur[]    findAll()
 * @method Animateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animateur::class);
    }

    // /**
    //  * @return Animateur[] Returns an array of Animateur objects
    //  */
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
    public function findOneBySomeField($value): ?Animateur
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
