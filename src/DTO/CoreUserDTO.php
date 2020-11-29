<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\CoreUser;

class CoreUserDTO
{
    public ?string $login = null;
    public ?string $email = null;
    public ?PersonalInfoDTO $personalInfo = null;

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): void
    {
        $this->login = $login;
    }

    public function getPersonalInfo(): ?PersonalInfoDTO
    {
        return $this->personalInfo;
    }

    public function setPersonalInfo(?PersonalInfoDTO $personalInfo): void
    {
        $this->personalInfo = $personalInfo;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function createEntityFromDto(): CoreUser
    {
        $personalInfo = $this->personalInfo->createEntityFromDto();
        $coreUser = new CoreUser($personalInfo);
        $coreUser
            ->setEmail($this->email)
            ->setLogin($this->login);

        return $coreUser;
    }
}