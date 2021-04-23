<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="App\Repository\formationRepository")
 */
class Formation
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
     * @var string
     *@Assert\NotBlank(message="Le champs est vide : Ajouter un sujet ")
     * @ORM\Column(name="sujet", type="string", length=100, nullable=false)
     */
    private $sujet;

    /**
     * @var \DateTime
     *@Assert\GreaterThan("today",message="La date du formation doit etre aprés le :{{ compared_value }}")
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "La description doit etre au minimum {{ limit }} characters ",
     *      maxMessage = "La description doit etre au maximum {{ limit }} characters"
     * )
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="effectif", type="integer", nullable=false)
     */
    private $effectif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEffectif(): ?int
    {
        return $this->effectif;
    }

    public function setEffectif(int $effectif): self
    {
        $this->effectif = $effectif;

        return $this;
    }




}
