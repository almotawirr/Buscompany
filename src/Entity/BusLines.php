<?php

namespace App\Entity;

use App\Repository\BusLinesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BusLinesRepository::class)]
class BusLines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $LineNumber;

    #[ORM\OneToMany(mappedBy: 'BusLine', targetEntity: Bus::class)]
    private $buses;

    public function __construct()
    {
        $this->buses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLineNumber(): ?int
    {
        return $this->LineNumber;
    }

    public function setLineNumber(int $LineNumber): self
    {
        $this->LineNumber = $LineNumber;

        return $this;
    }

    /**
     * @return Collection<int, Bus>
     */
    public function getBuses(): Collection
    {
        return $this->buses;
    }

    public function addBus(Bus $bus): self
    {
        if (!$this->buses->contains($bus)) {
            $this->buses[] = $bus;
            $bus->setBusLine($this);
        }

        return $this;
    }

    public function removeBus(Bus $bus): self
    {
        if ($this->buses->removeElement($bus)) {
            // set the owning side to null (unless already changed)
            if ($bus->getBusLine() === $this) {
                $bus->setBusLine(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->LineNumber;
    }
}
