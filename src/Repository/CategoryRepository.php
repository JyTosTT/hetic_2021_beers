<?php

namespace App\Repository;

use App\Entity\Beer;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findCategoriesByTerm(string $type = 'normal')
    {
        return $this->createQueryBuilder('category')
            ->orderBy('category.id', 'ASC')
            ->andWhere('category.term = :term')
            ->setParameter('term', $type)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findCategoriesByTermAndBeer(Beer $beer, string $type = 'normal')
    {
        return $this->createQueryBuilder('category')
            ->join('category.beers', 'beers')
            ->where('beers.id = :id')
            ->andWhere('category.term = :term')
            ->setParameters([
                'id' => $beer,
                'term' => $type
            ])
            ->getQuery()
            ->getResult()
            ;
    }
}
