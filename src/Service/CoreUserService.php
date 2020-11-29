<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\CoreUserDTO;
use App\Repository\CoreUserRepository;

class CoreUserService
{
    private CoreUserRepository $repository;

    public function __construct(CoreUserRepository $coreUserRepository)
    {
        $this->repository = $coreUserRepository;
    }

    public function save(CoreUserDTO $coreUserDTO): void
    {
        $coreUser = $coreUserDTO->createEntityFromDto();
        $this->repository->save($coreUser);
    }
}