<?php

namespace App\Repository;

use App\Entity\NewCharacterClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NewCharacterClass>
 *
 * @method NewCharacterClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewCharacterClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewCharacterClass[]    findAll()
 * @method NewCharacterClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewCharacterClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewCharacterClass::class);
    }

    public function add(NewCharacterClass $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NewCharacterClass $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return NewCharacterClass[] Returns an array of NewCharacterClass objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NewCharacterClass
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
