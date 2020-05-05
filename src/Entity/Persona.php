<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonaRepository")
 */
class Persona
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nombre", type="string", length=40, nullable= false)
     */
    private $nombre;

    /**
     * @ORM\Column(name="apellido", type="string", length=40, nullable= false)
     */
    private $apellido;

    /**
     * @ORM\Column(name="email", type="string", length=220, nullable= false)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="persona")
     */
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
    }

    /**
     * @return Collection|User[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

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
}
