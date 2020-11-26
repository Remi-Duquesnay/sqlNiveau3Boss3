<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Genres
 *
 * @ORM\Table(name="genres")
 * @ORM\Entity
 */
class Genre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Videogame", inversedBy="genre")
     * @ORM\JoinTable(name="gamesgenres",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idGenre", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idVideoGame", referencedColumnName="id")
     *   }
     * )
     */
    private $videogame;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->videogame = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Videogame[]
     */
    public function getVideogame(): Collection
    {
        return $this->videogame;
    }

    public function addVideogame(Videogame $videogame): self
    {
        if (!$this->videogame->contains($videogame)) {
            $this->videogame[] = $videogame;
        }

        return $this;
    }

    public function removeVideogame(Videogame $videogame): self
    {
        $this->videogame->removeElement($videogame);

        return $this;
    }

}
