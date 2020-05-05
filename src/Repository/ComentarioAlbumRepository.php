<?php

namespace App\Repository;

use App\Entity\ComentarioAlbum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ComentarioAlbum|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComentarioAlbum|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComentarioAlbum[]    findAll()
 * @method ComentarioAlbum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComentarioAlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComentarioAlbum::class);
    }

    // /**
    //  * @return ComentarioAlbum[] Returns an array of ComentarioAlbum objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ComentarioAlbum
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
