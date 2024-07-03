<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="UserGroup", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     */
    private $groups;

    // Add this property to the User class
    /**
    * @ORM\OneToMany(targetEntity="Post", mappedBy="user")
    */
    private $posts;

     // Getters and setters...

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(UserGroup $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
            $group->addUser($this);
        }

        return $this;
    }

    public function removeGroup(UserGroup $group): self
    {
        if ($this->groups->removeElement($group)) {
            $group->removeUser($this);
        }

        return $this;
    }
}
