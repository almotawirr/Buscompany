<?php

namespace App\Entity;

use App\Repository\BusTransfertsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BusTransfertsRepository::class)]
class BusTransferts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Bus::class, inversedBy: 'busTransferts')]
    private $Bus;

    #[ORM\OneToOne(targetEntity: BusLines::class, cascade: ['persist', 'remove'])]
    private $NewLine;

    #[ORM\OneToOne(targetEntity: Stops::class, cascade: ['persist', 'remove'])]
    private $FirstStop;

    #[ORM\OneToOne(targetEntity: Stops::class, cascade: ['persist', 'remove'])]
    private $LastStop;

    #[ORM\Column(type: 'time')]
    private $TravelTime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBus(): ?Bus
    {
        return $this->Bus;
    }

    public function setBus(?Bus $Bus): self
    {
        $this->Bus = $Bus;

        return $this;
    }

    public function getNewLine(): ?BusLines
    {
        return $this->NewLine;
    }

    public function setNewLine(?BusLines $NewLine): self
    {
        $this->NewLine = $NewLine;

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

    public function getTravelTime(): ?\DateTimeInterface
    {
        return $this->TravelTime;
    }

    public function setTravelTime(\DateTimeInterface $TravelTime): self
    {
        $this->TravelTime = $TravelTime;

        return $this;
    }
    public function __toString() {
        return $this->NewLine;
    }
}
