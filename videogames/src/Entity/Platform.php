<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Platform
 *
 * @ORM\Table(name="platform", indexes={@ORM\Index(name="FK_platform_constructor", columns={"idConstructor"})})
 * @ORM\Entity
 */
class Platform
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
     * @var Constructor
     *
     * @ORM\ManyToOne(targetEntity="Constructor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idConstructor", referencedColumnName="id")
     * })
     */
    private $constructor;

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

    public function getConstructor(): ?Constructor
    {
        return $this->constructor;
    }

    public function setConstructor(?Constructor $constructor): self
    {
        $this->Constructor = $constructor;

        return $this;
    }


}
