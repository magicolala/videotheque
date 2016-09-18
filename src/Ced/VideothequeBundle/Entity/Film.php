<?php

namespace Ced\VideothequeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="Ced\VideothequeBundle\Repository\FilmRepository")
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Bidirectional
     *
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="listeDesFilms")
     * @ORM\JoinTable(name="_assoc_film_genre",
     *   joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="film_id", referencedColumnName="id")}
     * )
     */
    protected $listeDesGenres;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=120)
     * @Assert\NotBlank()
     */
    protected $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listeDesGenres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listeDesGenres
     *
     * @param \Ced\VideothequeBundle\Entity\Genre $listeDesGenres
     * @return Film
     */
    public function addListeDesGenre(\Ced\VideothequeBundle\Entity\Genre $listeDesGenres)
    {
        $this->listeDesGenres[] = $listeDesGenres;

        return $this;
    }

    /**
     * Remove listeDesGenres
     *
     * @param \Ced\VideothequeBundle\Entity\Genre $listeDesGenres
     */
    public function removeListeDesGenre(\Ced\VideothequeBundle\Entity\Genre $listeDesGenres)
    {
        $this->listeDesGenres->removeElement($listeDesGenres);
    }

    /**
     * Get listeDesGenres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListeDesGenres()
    {
        return $this->listeDesGenres;
    }

    /**
     * Affichage d'une entité Film avec echo
     * @return string Représentation du film
     */
    public function __toString()
    {
        return $this->titre;
    }
}
