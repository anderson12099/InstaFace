<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagenXAlbumRepository")
 */
class ImagenXAlbum
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="numeroOrden", type="integer", nullable=true)
     */
    private $numeroOrden;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Imagen", inversedBy="albumsXimagen")
     */
    private $imagens;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Album", inversedBy="albumsXimagen")
     */
    private $albums;

    public function getAlbums(): ?Album
    {
        return $this->albums;
    }

    public function setAlbums(?Album $albums): self
    {
        $this->albums = $albums;

        return $this;
    }

    public function getImagens(): ?Imagen
    {
        return $this->imagens;
    }

    public function setImagens(?Imagen $imagens): self
    {
        $this->imagens = $imagens;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroOrden(): ?string
    {
        return $this->numeroOrden;
    }

    public function setNumeroOrden(?string $numeroOrden): self
    {
        $this->numeroOrden = $numeroOrden;

        return $this;
    }

}
