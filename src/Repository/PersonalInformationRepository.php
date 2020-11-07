<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\PersonalInformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PersonalInformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonalInformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonalInformation[]    findAll()
 * @method PersonalInformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonalInformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonalInformation::class);
    }

    public function save(PersonalInformation $personalInformation): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($personalInformation);
        $entityManager->flush();
    }
}
