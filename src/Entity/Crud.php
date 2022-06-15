<?php

namespace App\Entity;

use App\Repository\CrudRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CrudRepository::class)]
class Crud
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nazwa_produktu;

    #[ORM\Column(type: 'float')]
    private $Cena_produktu;

    #[ORM\Column(type: 'integer')]
    private $Stan_magazynowy;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Opis_produktu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwaProduktu(): ?string
    {
        return $this->Nazwa_produktu;
    }

    public function setNazwaProduktu(string $Nazwa_produktu): self
    {
        $this->Nazwa_produktu = $Nazwa_produktu;

        return $this;
    }

    public function getCenaProduktu(): ?float
    {
        return $this->Cena_produktu;
    }

    public function setCenaProduktu(float $Cena_produktu): self
    {
        $this->Cena_produktu = $Cena_produktu;

        return $this;
    }

    public function getStanMagazynowy(): ?int
    {
        return $this->Stan_magazynowy;
    }

    public function setStanMagazynowy(int $Stan_magazynowy): self
    {
        $this->Stan_magazynowy = $Stan_magazynowy;

        return $this;
    }

    public function getOpisProduktu(): ?string
    {
        return $this->Opis_produktu;
    }

    public function setOpisProduktu(?string $Opis_produktu): self
    {
        $this->Opis_produktu = $Opis_produktu;

        return $this;
    }
}
