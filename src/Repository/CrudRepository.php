<?php

namespace App\Repository;

use App\Entity\Crud;
use App\Entity\ClientInfo;
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

    public function search(?string $Product_Name)
    {
        $queryBuilder = $this->createQueryBuilder('c')
            ->where('c.Product_Name LIKE :Product_Name')
            ->setParameter('Product_Name', '%' . $Product_Name . '%');

        return $queryBuilder->getQuery()->execute();
    }
    public function selectAll()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql= 'select client_info.`id`,`Name`, `Surname`, `City`, `kod_pocztowy`, `Address`, `numer_zamowienia`,`Product_Name`,`Description` from crud, client_info where crud.id=client_info.numer_zamowienia';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();


        return $resultSet->fetchAllAssociative();



    }
}
