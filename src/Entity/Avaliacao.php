<?php

namespace App\Entity;

use App\Repository\AvaliacaoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaliacaoRepository::class)]
class Avaliacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url_git = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url_aplicacao = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $tech = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $desafios = null;

    #[ORM\Column(nullable: true)]
    private ?float $pretensao_salarial = null;

    #[ORM\Column(nullable: true)]
    private ?int $crescimento_esperado = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $feedback = null;

    #[ORM\Column(length: 255)]
    private ?string $disponibilidade = null;

    #[ORM\ManyToOne(inversedBy: 'avaliacao')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlGit(): ?string
    {
        return $this->url_git;
    }

    public function setUrlGit(string $url_git): static
    {
        $this->url_git = $url_git;

        return $this;
    }

    public function getUrlAplicacao(): ?string
    {
        return $this->url_aplicacao;
    }

    public function setUrlAplicacao(?string $url_aplicacao): static
    {
        $this->url_aplicacao = $url_aplicacao;

        return $this;
    }

    public function getTech(): ?string
    {
        return $this->tech;
    }

    public function setTech(?string $tech): static
    {
        $this->tech = $tech;

        return $this;
    }

    public function getDesafios(): ?string
    {
        return $this->desafios;
    }

    public function setDesafios(?string $desafios): static
    {
        $this->desafios = $desafios;

        return $this;
    }

    public function getPretensaoSalarial(): ?float
    {
        return $this->pretensao_salarial;
    }

    public function setPretensaoSalarial(?float $pretensao_salarial): static
    {
        $this->pretensao_salarial = $pretensao_salarial;

        return $this;
    }

    public function getCrescimentoEsperado(): ?int
    {
        return $this->crescimento_esperado;
    }

    public function setCrescimentoEsperado(?int $crescimento_esperado): static
    {
        $this->crescimento_esperado = $crescimento_esperado;

        return $this;
    }

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): static
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function getDisponibilidade(): ?string
    {
        return $this->disponibilidade;
    }

    public function setDisponibilidade(string $disponibilidade): static
    {
        $this->disponibilidade = $disponibilidade;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
