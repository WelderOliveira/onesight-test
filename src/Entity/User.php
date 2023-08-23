<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedin = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Avaliacao::class, orphanRemoval: true)]
    private Collection $avaliacao;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dt_confirmacao = null;

    public function __construct()
    {
        $this->avaliacao = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): static
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * @return Collection<int, Avaliacao>
     */
    public function getAvaliacao(): Collection
    {
        return $this->avaliacao;
    }

    public function addAvaliacao(Avaliacao $avaliacao): static
    {
        if (!$this->avaliacao->contains($avaliacao)) {
            $this->avaliacao->add($avaliacao);
            $avaliacao->setUser($this);
        }

        return $this;
    }

    public function removeAvaliacao(Avaliacao $avaliacao): static
    {
        if ($this->avaliacao->removeElement($avaliacao)) {
            // set the owning side to null (unless already changed)
            if ($avaliacao->getUser() === $this) {
                $avaliacao->setUser(null);
            }
        }

        return $this;
    }

    public function getDtConfirmacao(): ?\DateTimeInterface
    {
        return $this->dt_confirmacao;
    }

    public function setDtConfirmacao(?\DateTimeInterface $dt_confirmacao): static
    {
        $this->dt_confirmacao = $dt_confirmacao;

        return $this;
    }
}
