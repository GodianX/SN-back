<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoreUserRepository")
 */
class CoreUser
{
    public const TYPE_ADMIN = 1;
    public const TYPE_MODERATOR = 2;
    public const TYPE_WRITER = 3;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $login;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $registrationDate;

    /**
     * @ORM\Column(type="smallint")
     */
    private int $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isBanned;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $banDate = null;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\PersonalInformation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private PersonalInformation $personalInformation;

    public function __construct(int $userType = self::TYPE_WRITER)
    {
        $this->registrationDate = new \DateTime();
        $this->type = $userType;
        $this->isBanned = false;
        $this->personalInformation = new PersonalInformation();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBanDate(): ?\DateTimeInterface
    {
        return $this->banDate;
    }

    public function setBanDate(?\DateTimeInterface $banDate): self
    {
        $this->banDate = $banDate;

        return $this;
    }

    public function getPersonalInformation(): ?PersonalInformation
    {
        return $this->personalInformation;
    }

    public function setPersonalInformation(PersonalInformation $personalInformation): self
    {
        $this->personalInformation = $personalInformation;

        return $this;
    }
}
