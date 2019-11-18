<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity()
 * @UniqueEntity("email", message="Email already in use", groups={"Registration"})
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, max=20, groups={"Registration"})
     */
    private $firstname;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, max=20, groups={"Registration"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank(groups={"Registration"})
     */
    private $email;
    
    /**
     * @Assert\NotBlank(groups={"Registration"})
     * @Assert\Length(max=4096, groups={"Registration"})
     */
    private $plainPassword;
    
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;
    
    /**
     * @ORM\Column(type="array")
     */
    private $roles;
    
    public function __construct()
    {
        $this->roles = array('ROLE_USER');
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
}

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    
    public function getSalt()
    {
        return null;
    }
    
    public function getUsername()
    {
        return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }
    
    public function eraseCredentials()
    {
    }
}
