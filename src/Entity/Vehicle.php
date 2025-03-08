<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $brand = null;

    #[ORM\Column(length: 20)]
    private ?string $model = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $type = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $year_of_production = null;

    #[ORM\Column]
    private ?int $mileage = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $no_of_seats = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $no_of_door = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private ?bool $rented = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notice = null;

    /**
     * @var Collection<int, Rent>
     */
    #[ORM\OneToMany(targetEntity: Rent::class, mappedBy: 'vehicle_id', orphanRemoval: true)]
    private Collection $rents;

    public function __construct()
    {
        $this->rents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getYearOfProduction(): ?int
    {
        return $this->year_of_production;
    }

    public function setYearOfProduction(int $year_of_production): static
    {
        $this->year_of_production = $year_of_production;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getNoOfSeats(): ?int
    {
        return $this->no_of_seats;
    }

    public function setNoOfSeats(int $no_of_seats): static
    {
        $this->no_of_seats = $no_of_seats;

        return $this;
    }

    public function getNoOfDoor(): ?int
    {
        return $this->no_of_door;
    }

    public function setNoOfDoor(int $no_of_door): static
    {
        $this->no_of_door = $no_of_door;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function isRented(): ?bool
    {
        return $this->rented;
    }

    public function setRented(bool $rented): static
    {
        $this->rented = $rented;

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

    /**
     * @return Collection<int, Rent>
     */
    public function getRents(): Collection
    {
        return $this->rents;
    }

    public function addRent(Rent $rent): static
    {
        if (!$this->rents->contains($rent)) {
            $this->rents->add($rent);
            $rent->setVehicleId($this);
        }

        return $this;
    }

    public function removeRent(Rent $rent): static
    {
        if ($this->rents->removeElement($rent)) {
            // set the owning side to null (unless already changed)
            if ($rent->getVehicleId() === $this) {
                $rent->setVehicleId(null);
            }
        }

        return $this;
    }
}
