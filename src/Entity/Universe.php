<?php

namespace App\Entity;

use App\Repository\UniverseRepository;
use Cocur\Slugify\Slugify;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=UniverseRepository::class)
 * @Vich\Uploadable
 */
class Universe
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
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="products", fileNameProperty="imageName")
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity=AllCategory::class, mappedBy="universe")
     */
    private $AllCategory;

    public function __construct()
    {
        $this->AllCategory = new ArrayCollection();
    }

    /**
     * return a slug !
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
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

    /**
     * @return string|null
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @param string|null $imageName
     * @return $this
     */
    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|UploadedFile|null $imageFile
     *
     */
    public function setImageFile(File $imageFile = null)
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated_at = new \DateTimeImmutable();
        }
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

    public function getUpdatedAt(): DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return Collection|AllCategory[]
     */
    public function getAllCategory(): Collection
    {
        return $this->AllCategory;
    }

    public function addAllCategory(AllCategory $allCategory): self
    {
        if (!$this->AllCategory->contains($allCategory)) {
            $this->AllCategory[] = $allCategory;
            $allCategory->setUniverse($this);
        }

        return $this;
    }

    public function removeAllCategory(AllCategory $allCategory): self
    {
        if ($this->AllCategory->removeElement($allCategory)) {
            // set the owning side to null (unless already changed)
            if ($allCategory->getUniverse() === $this) {
                $allCategory->setUniverse(null);
            }
        }

        return $this;
    }
}
