<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\CoreUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CoreUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoreUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoreUser[]    findAll()
 * @method CoreUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoreUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoreUser::class);
    }

    public function save(CoreUser $coreUser): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($coreUser);
        $entityManager->flush();
    }
}
