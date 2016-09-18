<?php

namespace Ced\VideothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Genre
 *
 * @ORM\Table(name="genre")
 * @ORM\Entity(repositoryClass="Ced\VideothequeBundle\Repository\GenreRepository")
 */
class Genre
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
     * @ORM\ManyToMany(targetEntity="Film", mappedBy="listeDesGenres")
     */
    protected $listeDesFilms;

    /**
     * @var string
     *
     * @ORM\Column(name="nomLabel", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Le genre doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le genre ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    protected $nomLabel;


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
     * Set nomLabel
     *
     * @param string $nomLabel
     * @return Genre
     */
    public function setNomLabel($nomLabel)
    {
        $this->nomLabel = $nomLabel;

        return $this;
    }

    /**
     * Get nomLabel
     *
     * @return string
     */
    public function getNomLabel()
    {
        return $this->nomLabel;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listeDesFilms = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listeDesFilms
     *
     * @param \Ced\VideothequeBundle\Entity\Film $listeDesFilms
     * @return Genre
     */
    public function addListeDesFilm(\Ced\VideothequeBundle\Entity\Film $listeDesFilms)
    {
        $this->listeDesFilms[] = $listeDesFilms;

        return $this;
    }

    /**
     * Remove listeDesFilms
     *
     * @param \Ced\VideothequeBundle\Entity\Film $listeDesFilms
     */
    public function removeListeDesFilm(\Ced\VideothequeBundle\Entity\Film $listeDesFilms)
    {
        $this->listeDesFilms->removeElement($listeDesFilms);
    }

    /**
     * Get listeDesFilms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListeDesFilms()
    {
        return $this->listeDesFilms;
    }

    /**
     * Affichage d'une entité Genre avec echo
     * @return string Représentation du genre
     */
    public function __toString()
    {
        return $this->nomLabel;
    }
}
