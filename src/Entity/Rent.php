<?php

namespace App\Entity;

use App\Repository\RentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentRepository::class)]
class Rent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'rents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicle $vehicle_id = null;

    #[ORM\ManyToOne(inversedBy: 'rents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $rent_time = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $return_time = null;

    #[ORM\Column]
    private ?int $start_mileage = null;

    #[ORM\Column]
    private ?int $end_mileage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleId(): ?Vehicle
    {
        return $this->vehicle_id;
    }

    public function setVehicleId(?Vehicle $vehicle_id): static
    {
        $this->vehicle_id = $vehicle_id;

        return $this;
    }

    public function getPersonId(): ?Person
    {
        return $this->person_id;
    }

    public function setPersonId(?Person $person_id): static
    {
        $this->person_id = $person_id;

        return $this;
    }

    public function getRentTime(): ?\DateTimeInterface
    {
        return $this->rent_time;
    }

    public function setRentTime(\DateTimeInterface $rent_time): static
    {
        $this->rent_time = $rent_time;

        return $this;
    }

    public function getReturnTime(): ?\DateTimeInterface
    {
        return $this->return_time;
    }

    public function setReturnTime(\DateTimeInterface $return_time): static
    {
        $this->return_time = $return_time;

        return $this;
    }

    public function getStartMileage(): ?int
    {
        return $this->start_mileage;
    }

    public function setStartMileage(int $start_mileage): static
    {
        $this->start_mileage = $start_mileage;

        return $this;
    }

    public function getEndMileage(): ?int
    {
        return $this->end_mileage;
    }

    public function setEndMileage(int $end_mileage): static
    {
        $this->end_mileage = $end_mileage;

        return $this;
    }

    public function getNotice(): ?string
    {
        return $this->notice;
    }

    public function setNotice(?string $notice): static
    {
        $this->notice = $notice;

        return $this;
    }
}
