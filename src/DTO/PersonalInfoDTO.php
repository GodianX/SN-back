<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\PersonalInformation;

class PersonalInfoDTO
{
    public ?string $firstName = null;
    public ?string $familyName = null;
    public ?\DateTimeInterface $dateBirth = null;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->dateBirth;
    }

    public function setDateBirth(?\DateTimeInterface $dateBirth): void
    {
        $this->dateBirth = $dateBirth;
    }

    public function createEntityFromDto(): PersonalInformation
    {
        $personalInfo = new PersonalInformation();
        $personalInfo
            ->setFirstName($this->firstName)
            ->setFamilyName($this->familyName)
            ->setDateBirth($this->dateBirth);

        return $personalInfo;
    }
}