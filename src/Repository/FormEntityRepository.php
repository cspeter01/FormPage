<?php

namespace App\Repository;

use App\Entity\FormEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormEntity[]    findAll()
 * @method FormEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormEntity::class);
    }

    // /**
    //  * @return FormEntity[] Returns an array of FormEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormEntity
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
