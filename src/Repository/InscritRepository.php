<?php

namespace App\Repository;

use App\Entity\Inscrit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Inscrit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inscrit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inscrit[]    findAll()
 * @method Inscrit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscritRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inscrit::class);
    }

     /**
      * @return Inscrit[] Returns an array of Inscrit objects
      */
    public function findOneByNomPrenom()
    {
        $entityManager = $this->getEntityManager();

    $query = $entityManager->createQuery(
        'SELECT i, inscription
        FROM App\Entity\Inscrit i
        INNER JOIN i.inscription inscription
        WHERE i.id = :id'
    )->setParameter('id', $inscrit);

    return $query->getOneOrNullResult();
    }
}
