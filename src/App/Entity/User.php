<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
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
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $createdAt;
   
     /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
   private $updatedAt;
    
    /**
     * @ORM\ManyToMany(targetEntity="UserGroup", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     */
    private $groups;
 
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
    // Lifecycle callback methods

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    // Getter and setter methods for createdAt and updatedAt

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @ORM\PostPersist
     */
    public function postPersist()
    {
        // Logic to execute after the entity is persisted
        echo "User has been persisted with ID: " . $this->id . "\n";
    }

    /**
     * @ORM\PostUpdate
     */
    public function postUpdate()
    {
        // Logic to execute after the entity is updated
        echo "User with ID: " . $this->id . " has been updated.\n";
    }

    /**
     * @ORM\PostRemove
     */
    public function postRemove()
    {
        // Logic to execute after the entity is removed
        echo "User with ID: " . $this->id . " has been removed.\n";
    }
}
