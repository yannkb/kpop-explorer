<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupRepository::class)]
#[ORM\Table(name: '`group`')]
class Group
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'kpopGroups')]
    private ?Company $company = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'subgroups')]
    private ?self $parentGroup = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parentGroup')]
    private Collection $subgroups;

    #[ORM\Column]
    private ?bool $isCollab = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $koreanName = null;

    #[ORM\Column(length: 255)]
    private ?string $previousName = null;

    #[ORM\Column(length: 255)]
    private ?string $previousKoreanName = null;

    #[ORM\Column(length: 255)]
    private ?string $fullName = null;

    #[ORM\Column(length: 255)]
    private ?string $alias = null;

    #[ORM\Column(length: 255)]
    private ?string $members = null;

    #[ORM\Column]
    private ?bool $isSolo = null;

    #[ORM\Column]
    private ?int $formation = null;

    #[ORM\Column(length: 255)]
    private ?string $disband = null;

    #[ORM\Column(length: 255)]
    private ?string $fanclub = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $debutDate = null;

    #[ORM\Column(length: 255)]
    private ?string $birthDate = null;

    #[ORM\Column]
    private ?bool $isDeceased = null;

    #[ORM\Column]
    private ?int $sales = null;

    #[ORM\Column]
    private ?int $awards = null;

    #[ORM\Column]
    private ?int $views = null;

    #[ORM\Column]
    private ?int $totalPak = null;

    #[ORM\Column]
    private ?int $gaonDigitalTimes = null;

    #[ORM\Column]
    private ?int $gaonDigitalFirsts = null;

    #[ORM\Column]
    private ?int $yawardsTotal = null;

    #[ORM\Column(length: 255)]
    private ?string $social = null;

    #[ORM\Column]
    private ?int $mslevel = null;

    public function __construct()
    {
        $this->subgroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getParentGroup(): ?self
    {
        return $this->parentGroup;
    }

    public function setParentGroup(?self $parentGroup): static
    {
        $this->parentGroup = $parentGroup;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSubgroups(): Collection
    {
        return $this->subgroups;
    }

    public function addSubgroup(self $subgroup): static
    {
        if (!$this->subgroups->contains($subgroup)) {
            $this->subgroups->add($subgroup);
            $subgroup->setParentGroup($this);
        }

        return $this;
    }

    public function removeSubgroup(self $subgroup): static
    {
        if ($this->subgroups->removeElement($subgroup)) {
            // set the owning side to null (unless already changed)
            if ($subgroup->getParentGroup() === $this) {
                $subgroup->setParentGroup(null);
            }
        }

        return $this;
    }

    public function isCollab(): ?bool
    {
        return $this->isCollab;
    }

    public function setCollab(bool $isCollab): static
    {
        $this->isCollab = $isCollab;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getKoreanName(): ?string
    {
        return $this->koreanName;
    }

    public function setKoreanName(string $koreanName): static
    {
        $this->koreanName = $koreanName;

        return $this;
    }

    public function getPreviousName(): ?string
    {
        return $this->previousName;
    }

    public function setPreviousName(string $previousName): static
    {
        $this->previousName = $previousName;

        return $this;
    }

    public function getPreviousKoreanName(): ?string
    {
        return $this->previousKoreanName;
    }

    public function setPreviousKoreanName(string $previousKoreanName): static
    {
        $this->previousKoreanName = $previousKoreanName;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): static
    {
        $this->alias = $alias;

        return $this;
    }

    public function getMembers(): ?string
    {
        return $this->members;
    }

    public function setMembers(string $members): static
    {
        $this->members = $members;

        return $this;
    }

    public function isSolo(): ?bool
    {
        return $this->isSolo;
    }

    public function setSolo(bool $isSolo): static
    {
        $this->isSolo = $isSolo;

        return $this;
    }

    public function getFormation(): ?int
    {
        return $this->formation;
    }

    public function setFormation(int $formation): static
    {
        $this->formation = $formation;

        return $this;
    }

    public function getDisband(): ?string
    {
        return $this->disband;
    }

    public function setDisband(string $disband): static
    {
        $this->disband = $disband;

        return $this;
    }

    public function getFanclub(): ?string
    {
        return $this->fanclub;
    }

    public function setFanclub(string $fanclub): static
    {
        $this->fanclub = $fanclub;

        return $this;
    }

    public function getDebutDate(): ?\DateTimeInterface
    {
        return $this->debutDate;
    }

    public function setDebutDate(\DateTimeInterface $debutDate): static
    {
        $this->debutDate = $debutDate;

        return $this;
    }

    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function isDeceased(): ?bool
    {
        return $this->isDeceased;
    }

    public function setDeceased(bool $isDeceased): static
    {
        $this->isDeceased = $isDeceased;

        return $this;
    }

    public function getSales(): ?int
    {
        return $this->sales;
    }

    public function setSales(int $sales): static
    {
        $this->sales = $sales;

        return $this;
    }

    public function getAwards(): ?int
    {
        return $this->awards;
    }

    public function setAwards(int $awards): static
    {
        $this->awards = $awards;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): static
    {
        $this->views = $views;

        return $this;
    }

    public function getTotalPak(): ?int
    {
        return $this->totalPak;
    }

    public function setTotalPak(int $totalPak): static
    {
        $this->totalPak = $totalPak;

        return $this;
    }

    public function getGaonDigitalTimes(): ?int
    {
        return $this->gaonDigitalTimes;
    }

    public function setGaonDigitalTimes(int $gaonDigitalTimes): static
    {
        $this->gaonDigitalTimes = $gaonDigitalTimes;

        return $this;
    }

    public function getGaonDigitalFirsts(): ?int
    {
        return $this->gaonDigitalFirsts;
    }

    public function setGaonDigitalFirsts(int $gaonDigitalFirsts): static
    {
        $this->gaonDigitalFirsts = $gaonDigitalFirsts;

        return $this;
    }

    public function getYawardsTotal(): ?int
    {
        return $this->yawardsTotal;
    }

    public function setYawardsTotal(int $yawardsTotal): static
    {
        $this->yawardsTotal = $yawardsTotal;

        return $this;
    }

    public function getSocial(): ?string
    {
        return $this->social;
    }

    public function setSocial(string $social): static
    {
        $this->social = $social;

        return $this;
    }

    public function getMslevel(): ?int
    {
        return $this->mslevel;
    }

    public function setMslevel(int $mslevel): static
    {
        $this->mslevel = $mslevel;

        return $this;
    }
}
