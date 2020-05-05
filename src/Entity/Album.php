<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 */
class Album
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="nombre", type="string", length=40, nullable= false)
     */
    private $nombre;

    /**
     * @var string|null
     * 
     * @ORM\Column(name="descripcion", type="string", length=300, nullable= true)
     */
    private $descripcion;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="created_at", type="date",  nullable= false)
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="albums")
     */
    private $usuario;

   /**
    * @ORM\OneToMany(targetEntity="App\Entity\ImagenXAlbum", mappedBy="albums")
    */
    private $albumsXimagen;


    public function __construct()
    {
        $this->albumsXimagen = new ArrayCollection();   
    }

    /**
     * @return Collection|ImagenXAlbum[]
     */
    public function getAlbumsXImagen(): Collection
    {
        return $this->albumsXimagen;
    }

    public function getUser(): ?User
    {
        return $this->usuario;
    }

    public function setUser(?User $usuario): self
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

    public function setDescripcion(?string $descripcion): self
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
