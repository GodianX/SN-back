<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    private $em;
    private $userRepository;

    public function __construct(EntityManagerInterface $em, UserRepository $userRepository)
    {
        $this->em = $em;
        $this->userRepository = $userRepository;
    }

    public function create(): User
    {
        $user = new User();

        $user
            ->setName('Volodia')
            ->setAge(11);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    public function getUserByAge(int $age): array
    {
        return $this->userRepository->getUserByAge($age);
    }
}
