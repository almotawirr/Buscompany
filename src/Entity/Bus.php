<?php

namespace App\Entity;

use App\Repository\BusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BusRepository::class)]
class Bus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $RegistrationNumber;

    #[ORM\ManyToOne(targetEntity: BusLines::class, inversedBy: 'buses')]
    private $BusLine;

    #[ORM\OneToOne(targetEntity: Stops::class, cascade: ['persist', 'remove'])]
    private $FirstStop;

    #[ORM\OneToOne(targetEntity: Stops::class, cascade: ['persist', 'remove'])]
    private $LastStop;

    #[ORM\OneToMany(mappedBy: 'Bus', targetEntity: BusTransferts::class)]
    private $busTransferts;

    #[ORM\Column(type: 'time')]
    private $TravelTime;

    public function __construct()
    {
        $this->busTransferts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->RegistrationNumber;
    }

    public function setRegistrationNumber(string $RegistrationNumber): self
    {
        $this->RegistrationNumber = $RegistrationNumber;

        return $this;
    }

    public function getBusLine(): ?BusLines
    {
        return $this->BusLine;
    }

    public function setBusLine(?BusLines $BusLine): self
    {
        $this->BusLine = $BusLine;

        return $this;
    }


    public function getFirstStop(): ?Stops
    {
        return $this->FirstStop;
    }

    public function setFirstStop(?Stops $FirstStop): self
    {
        $this->FirstStop = $FirstStop;

        return $this;
    }

    public function getLastStop(): ?Stops
    {
        return $this->LastStop;
    }

    public function setLastStop(?Stops $LastStop): self
    {
        $this->LastStop = $LastStop;

        return $this;
    }
    public function __toString() {
        return $this->RegistrationNumber;
    }

    /**
     * @return Collection<int, BusTransferts>
     */
    public function getBusTransferts(): Collection
    {
        return $this->busTransferts;
    }

    public function addBusTransfert(BusTransferts $busTransfert): self
    {
        if (!$this->busTransferts->contains($busTransfert)) {
            $this->busTransferts[] = $busTransfert;
            $busTransfert->setBus($this);
        }

        return $this;
    }

    public function removeBusTransfert(BusTransferts $busTransfert): self
    {
        if ($this->busTransferts->removeElement($busTransfert)) {
            // set the owning side to null (unless already changed)
            if ($busTransfert->getBus() === $this) {
                $busTransfert->setBus(null);
            }
        }

        return $this;
    }

    public function getTravelTime(): ?\DateTimeInterface
    {
        return $this->TravelTime;
    }

    public function setTravelTime(\DateTimeInterface $TravelTime): self
    {
        $this->TravelTime = $TravelTime;

        return $this;
    }

   
}
