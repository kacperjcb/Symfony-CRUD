<?php

namespace App\Repository;

use App\Entity\DaneKlienta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DaneKlienta>
 *
 * @method DaneKlienta|null find($id, $lockMode = null, $lockVersion = null)
 * @method DaneKlienta|null findOneBy(array $criteria, array $orderBy = null)
 * @method DaneKlienta[]    findAll()
 * @method DaneKlienta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DaneKlientaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DaneKlienta::class);
    }

    public function add(DaneKlienta $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DaneKlienta $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DaneKlienta[] Returns an array of DaneKlienta objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DaneKlienta
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
