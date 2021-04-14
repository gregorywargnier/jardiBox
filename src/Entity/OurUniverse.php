<?php

namespace App\Entity;

use App\Repository\OurUniverseRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OurUniverseRepository::class)
 */
class OurUniverse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=AllCategories::class, mappedBy="ourUniverse")
     */
    private $allCategories;

    public function __construct()
    {
        $this->allCategories = new ArrayCollection();
    }


    /**
     * return a slug !
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * @return void
     */
    public function initializeSlug() {
        $slugify = new Slugify();
        $this->slug = $slugify->slugify($this->title);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|AllCategories[]
     */
    public function getAllCategories(): Collection
    {
        return $this->allCategories;
    }

    public function addAllCategory(AllCategories $allCategory): self
    {
        if (!$this->allCategories->contains($allCategory)) {
            $this->allCategories[] = $allCategory;
            $allCategory->setOurUniverse($this);
        }

        return $this;
    }

    public function removeAllCategory(AllCategories $allCategory): self
    {
        if ($this->allCategories->removeElement($allCategory)) {
            // set the owning side to null (unless already changed)
            if ($allCategory->getOurUniverse() === $this) {
                $allCategory->setOurUniverse(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
