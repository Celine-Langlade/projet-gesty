<?php

namespace Gesty\GestyBundle\Entity;

/**
 * Eleve
 */
class Eleve
{
    /**
     * @return string
     */

    public function __toString()
    {
        return $this->nom;
    }
    // GENERATE CODE

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var \DateTime
     */
    private $dateDeNaissance;

    /**
     * @var integer
     */
    private $idFoyer;

    /**
     * @var integer
     */
    private $idEtablissement;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Eleve
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Eleve
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateDeNaissance
     *
     * @param \DateTime $dateDeNaissance
     *
     * @return Eleve
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    /**
     * Get dateDeNaissance
     *
     * @return \DateTime
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * Set idFoyer
     *
     * @param integer $idFoyer
     *
     * @return Eleve
     */
    public function setIdFoyer($idFoyer)
    {
        $this->idFoyer = $idFoyer;

        return $this;
    }

    /**
     * Get idFoyer
     *
     * @return integer
     */
    public function getIdFoyer()
    {
        return $this->idFoyer;
    }

    /**
     * Set idEtablissement
     *
     * @param integer $idEtablissement
     *
     * @return Eleve
     */
    public function setIdEtablissement($idEtablissement)
    {
        $this->idEtablissement = $idEtablissement;

        return $this;
    }

    /**
     * Get idEtablissement
     *
     * @return integer
     */
    public function getIdEtablissement()
    {
        return $this->idEtablissement;
    }
}

