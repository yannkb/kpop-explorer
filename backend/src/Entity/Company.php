<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'companies')]
    private ?self $parentCompany = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parentCompany')]
    private Collection $companies;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Group>
     */
    #[ORM\OneToMany(targetEntity: Group::class, mappedBy: 'company')]
    private Collection $kpopGroups;

    public function __construct()
    {
        $this->companies = new ArrayCollection();
        $this->kpopGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentCompany(): ?self
    {
        return $this->parentCompany;
    }

    public function setParentCompany(?self $parentCompany): static
    {
        $this->parentCompany = $parentCompany;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(self $company): static
    {
        if (!$this->companies->contains($company)) {
            $this->companies->add($company);
            $company->setParentCompany($this);
        }

        return $this;
    }

    public function removeCompany(self $company): static
    {
        if ($this->companies->removeElement($company)) {
            // set the owning side to null (unless already changed)
            if ($company->getParentCompany() === $this) {
                $company->setParentCompany(null);
            }
        }

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

    /**
     * @return Collection<int, Group>
     */
    public function getKpopGroups(): Collection
    {
        return $this->kpopGroups;
    }

    public function addKpopGroup(Group $kpopGroup): static
    {
        if (!$this->kpopGroups->contains($kpopGroup)) {
            $this->kpopGroups->add($kpopGroup);
            $kpopGroup->setCompany($this);
        }

        return $this;
    }

    public function removeKpopGroup(Group $kpopGroup): static
    {
        if ($this->kpopGroups->removeElement($kpopGroup)) {
            // set the owning side to null (unless already changed)
            if ($kpopGroup->getCompany() === $this) {
                $kpopGroup->setCompany(null);
            }
        }

        return $this;
    }
}
