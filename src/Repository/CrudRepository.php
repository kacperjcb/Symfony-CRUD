<?php

namespace App\Repository;

use App\Entity\Crud;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Crud>
 *
 * @method Crud|null find($id, $lockMode = null, $lockVersion = null)
 * @method Crud|null findOneBy(array $criteria, array $orderBy = null)
 * @method Crud[]    findAll()
 * @method Crud[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrudRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Crud::class);
    }

    public function add(Crud $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Crud $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function search(?string $Nazwa_produktu)
    {
        $queryBuilder = $this->createQueryBuilder('c')
            ->where('c.Nazwa_produktu LIKE :Nazwa_produktu')
            ->setParameter('Nazwa_produktu', '%' . $Nazwa_produktu . '%');

        return $queryBuilder->getQuery()->execute();
    }

}
