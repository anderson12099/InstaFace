<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagenXalbum
 *
 * @ORM\Table(name="imagen_xalbum", indexes={@ORM\Index(name="IDX_8C4D54EDAFB5B7E4", columns={"imagens_id"}), @ORM\Index(name="IDX_8C4D54EDECBB55AF", columns={"albums_id"})})
 * @ORM\Entity
 */
class ImagenXalbum
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numeroOrden", type="integer", nullable=true)
     */
    private $numeroorden;

    /**
     * @var \Imagen
     *
     * @ORM\ManyToOne(targetEntity="Imagen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imagens_id", referencedColumnName="id")
     * })
     */
    private $imagens;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="albums_id", referencedColumnName="id")
     * })
     */
    private $albums;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroorden(): ?int
    {
        return $this->numeroorden;
    }

    public function setNumeroorden(?int $numeroorden): self
    {
        $this->numeroorden = $numeroorden;

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

    public function getAlbums(): ?Album
    {
        return $this->albums;
    }

    public function setAlbums(?Album $albums): self
    {
        $this->albums = $albums;

        return $this;
    }


}
