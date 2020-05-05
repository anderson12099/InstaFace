<?php

namespace App\Repository;

use App\Entity\ImagenXAlbum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImagenXAlbum|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagenXAlbum|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagenXAlbum[]    findAll()
 * @method ImagenXAlbum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagenXAlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagenXAlbum::class);
    }

    // /**
    //  * @return ImagenXAlbum[] Returns an array of ImagenXAlbum objects
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
    public function findOneBySomeField($value): ?ImagenXAlbum
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
