<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\Table(name: "users")]
class Users implements UserInterface, PasswordAuthenticatedUserInterface {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $lastName;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private string $email;

    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank]
    private string $password;
    #[ORM\Column(type: 'string')]
    private ?string $role = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $position = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $testingSystems = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $reportingSystems = null;

    #[ORM\Column(type: 'boolean')]
    private bool $knowsSelenium = false;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $ideEnvironments = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $programmingLanguages = null;

    #[ORM\Column(type: 'boolean')]
    private bool $knowsMySQL = false;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $projectManagementMethodologies = null;

    #[ORM\Column(type: 'boolean')]
    private bool $knowsScrum = false;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    public function getTestingSystems(): ?string
    {
        return $this->testingSystems;
    }

    public function setTestingSystems(?string $testingSystems): void
    {
        $this->testingSystems = $testingSystems;
    }

    public function getReportingSystems(): ?string
    {
        return $this->reportingSystems;
    }

    public function setReportingSystems(?string $reportingSystems): void
    {
        $this->reportingSystems = $reportingSystems;
    }

    public function isKnowsSelenium(): bool
    {
        return $this->knowsSelenium;
    }

    public function setKnowsSelenium(bool $knowsSelenium): void
    {
        $this->knowsSelenium = $knowsSelenium;
    }

    public function getIdeEnvironments(): ?string
    {
        return $this->ideEnvironments;
    }

    public function setIdeEnvironments(?string $ideEnvironments): void
    {
        $this->ideEnvironments = $ideEnvironments;
    }

    public function getProgrammingLanguages(): ?string
    {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages(?string $programmingLanguages): void
    {
        $this->programmingLanguages = $programmingLanguages;
    }

    public function isKnowsMySQL(): bool
    {
        return $this->knowsMySQL;
    }

    public function setKnowsMySQL(bool $knowsMySQL): void
    {
        $this->knowsMySQL = $knowsMySQL;
    }

    public function getProjectManagementMethodologies(): ?string
    {
        return $this->projectManagementMethodologies;
    }

    public function setProjectManagementMethodologies(?string $projectManagementMethodologies): void
    {
        $this->projectManagementMethodologies = $projectManagementMethodologies;
    }

    public function isKnowsScrum(): bool
    {
        return $this->knowsScrum;
    }

    public function setKnowsScrum(bool $knowsScrum): void
    {
        $this->knowsScrum = $knowsScrum;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self {
        $this->lastName = $lastName;
        return $this;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;
        return $this;
    }

    public function getRoles(): array {
        return ['ROLE_USER'];
    }

    public function getUsername(): string {
        return $this->email;
    }

    public function eraseCredentials(): void
    {

    }

    public function getUserIdentifier(): string {
        return $this->email;
    }

    public function getRole(): ?string {
        return $this->role;
    }

    public function setRole(?string $role): self {
        $this->role = $role;
        return $this;
    }
}
