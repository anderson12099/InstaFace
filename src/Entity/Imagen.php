<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagenRepository")
 */
class Imagen
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
     * @ORM\Column(name="descripcion", type="string", length=300, nullable= false)
     */
    private $descripcion;

    /**
     * @ORM\Column(name="foto", type="string", length=300, nullable= false)
     */
    private $foto;

    /**
     * @ORM\Column(name="created_at", type="date",  nullable= false)
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="imagenes")
     */
    private $usuario;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\ImagenXAlbum", mappedBy="imagens")
    */
    private $albumsXimagen;


    public function __construct()
    {
        $this->albumsXimagen = new ArrayCollection();   
    }

    /**
     * @return Collection|ImagenXAlbum[]
     */
    public function getalbumsXimagen(): Collection
    {
        return $this->albumsXimagen;
    }

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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
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

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

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
