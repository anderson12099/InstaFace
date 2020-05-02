<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends Persona implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Persona", inversedBy="usuario")
     */
    private $persona;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Album", mappedBy="usuario")
     */
    private $albums;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Imagen", mappedBy="usuario")
     */
    private $imagenes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ComentarioAlbum", mappedBy="usuario")
     */
    private $comentariosAlbum;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ComentarioImagen", mappedBy="usuario")
     */
    private $comentarioImagenes;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
        $this->imagenes = new ArrayCollection();
        $this->comentariosAlbum = new ArrayCollection();
        $this->comentarioImagenes = new ArrayCollection();
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    /**
     * @return Collection|Imagen[]
     */
    public function getImagenes(): Collection
    {
        return $this->imagenes;
    }

    /**
     * @return Collection|ComentarioAlbum[]
     */
    public function getComentariosAlbum(): Collection
    {
        return $this->comentariosAlbum;
    }

    /**
     * @return Collection|ComentarioAlbum[]
     */
    public function getComentarioImagenes(): Collection
    {
        return $this->comentarioImagenes;
    }

    public function getPersona(): ?Persona
    {
        return $this->persona;
    }

    public function setPersona(?Persona $persona): self
    {
        $this->persona = $persona;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
