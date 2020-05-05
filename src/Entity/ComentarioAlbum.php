<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComentarioAlbumRepository")
 */
class ComentarioAlbum
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="descripcion", type="string", length=300, nullable= false)
     */
    private $descripcion;

    /**
     * @ORM\Column(name="created_at", type="date",  nullable= false)
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comentariosAlbum")
     */
    private $usuario;

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
