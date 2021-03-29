<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\Length(
     *      min=3,
     *      max=80,
     *      minMessage="Your lastname must be at least {{ limit }} characters long.",
     *      maxMessage="Your lastname cannot be longer than {{ limit }} characters."
     * )
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\Length(
     *      min=3,
     *      max=80,
     *      minMessage="Your firstname must be at least {{ limit }} characters long.",
     *      maxMessage="Your firstname cannot be longer than {{ limit }} characters."
     * )
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email.")
     */
    private $mail;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=10, max=1800, minMessage="Your description must be at least 10 characters long", maxMessage="Your description must not exceed 1800 characters")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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

}
