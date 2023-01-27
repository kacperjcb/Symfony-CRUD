<?php

namespace App\Entity;
use App\Repository\DaneKlientaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DaneKlientaRepository::class)]
class DaneKlienta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Imie;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nazwisko;

    #[ORM\Column(type: 'string', length: 255)]
    private $Miasto;

    #[ORM\Column(type: 'string', length: 255)]
    private $KodPocztowy;

    #[ORM\Column(type: 'string', length: 255)]
    private $Adres;

    #[ORM\Column(type: 'integer', nullable:true)]
    private $NumerZamowienia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImie(): ?string
    {
        return $this->Imie;
    }

    public function setImie(string $Imie): self
    {
        $this->Imie = $Imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->Nazwisko;
    }

    public function setNazwisko(string $Nazwisko): self
    {
        $this->Nazwisko = $Nazwisko;

        return $this;
    }

    public function getMiasto(): ?string
    {
        return $this->Miasto;
    }

    public function setMiasto(string $Miasto): self
    {
        $this->Miasto = $Miasto;

        return $this;
    }

    public function getKodPocztowy(): ?string
    {
        return $this->KodPocztowy;
    }

    public function setKodPocztowy(string $KodPocztowy): self
    {
        $this->KodPocztowy = $KodPocztowy;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->Adres;
    }

    public function setAdres(string $Adres): self
    {
        $this->Adres = $Adres;

        return $this;
    }

    public function getNumerZamowienia(): ?int
    {
        return $this->NumerZamowienia;
    }

    public function setNumerZamowienia(?int $NumerZamowienia): self
    {
        $this->NumerZamowienia = $NumerZamowienia;

        return $this;
    }
}
