<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Videogames
 *
 * @ORM\Table(name="videogames", indexes={@ORM\Index(name="FK_videogames_publishers", columns={"idPublisher"}), @ORM\Index(name="FK_videogames_videogames_2", columns={"idDeveloper"}), @ORM\Index(name="FK_videogames_videogames", columns={"idPlatform"})})
 * @ORM\Entity
 */
class Videogame
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
     * @ORM\Column(name="Title", type="string", length=256, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ReleaseDate", type="string", length=64, nullable=true)
     */
    private $releasedate;

    /**
     * @var Publisher
     *
     * @ORM\ManyToOne(targetEntity="Publisher", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPublisher", referencedColumnName="id")
     * })
     */
    private $publisher;

    /**
     * @var Platform
     *
     * @ORM\ManyToOne(targetEntity="Platform", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPlatform", referencedColumnName="id")
     * })
     */
    private $platform;

    /**
     * @var Developer
     *
     * @ORM\ManyToOne(targetEntity="Developer", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDeveloper", referencedColumnName="id")
     * })
     */
    private $developer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Genre", mappedBy="videogame", fetch="EAGER")
     * 
     */
    private $genre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->genre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getReleasedate(): ?string
    {
        return $this->releasedate;
    }

    public function setReleasedate(?string $releasedate): self
    {
        $this->releasedate = $releasedate;

        return $this;
    }

    public function getPublisher(): ?Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(?Publisher $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getPlatform(): ?Platform
    {
        return $this->platform;
    }

    public function setPlatform(?Platform $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getDeveloper(): ?Developer
    {
        return $this->developer;
    }

    public function setDeveloper(?Developer $developer): self
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * @return Collection|Genres[]
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
            $genre->addVideogame($this);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genre->removeElement($genre)) {
            $genre->removeVideogame($this);
        }

        return $this;
    }

}
