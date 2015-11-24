<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Symfony\Component\HttpFoundation\File\File;

/**
 * This file has been generated by the Sonata EasyExtends bundle ( http://sonata-project.org/bundles/easy-extends )
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @author <yourname> <youremail>
 */
class User extends BaseUser
{
    /**
     * @var File
     * Champs virtuel servant à stocker un fichier provenant du formulaire
     */

    public $file;

    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../../app/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->justificatif ? null : $this->getUploadDir().'/'.$this->justificatif;
    }

    public function getAbsolutePath()
    {
        return null === $this->justificatif ? null : $this->getUploadRootDir().'/'.$this->justificatif;
    }

    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->justificatif = uniqid().'.'.$this->file->guessExtension();
        }
    }

    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->justificatif);

        unset($this->file);
    }

    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }



   /** Generate code */

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string
     */
    private $adresse;

    /**
     * @var integer
     */
    private $codePostal;

    /**
     * @var string
     */
    private $commune;

    /**
     * @var integer
     */
    private $telephoneSecondaire;

    /**
     * @var string
     */
    private $caf;

    /**
     * @var integer
     */
    private $modeDePaiement;

    /**
     * @var string
     */
    private $numeroIban;

    /**
     * @var boolean
     */
    private $mandatActif;


    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return User
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set commune
     *
     * @param string $commune
     *
     * @return User
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return string
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set telephoneSecondaire
     *
     * @param integer $telephoneSecondaire
     *
     * @return User
     */
    public function setTelephoneSecondaire($telephoneSecondaire)
    {
        $this->telephoneSecondaire = $telephoneSecondaire;

        return $this;
    }

    /**
     * Get telephoneSecondaire
     *
     * @return integer
     */
    public function getTelephoneSecondaire()
    {
        return $this->telephoneSecondaire;
    }

    /**
     * Set caf
     *
     * @param string $caf
     *
     * @return User
     */
    public function setCaf($caf)
    {
        $this->caf = $caf;

        return $this;
    }

    /**
     * Get caf
     *
     * @return string
     */
    public function getCaf()
    {
        return $this->caf;
    }

    /**
     * Set modeDePaiement
     *
     * @param integer $modeDePaiement
     *
     * @return User
     */
    public function setModeDePaiement($modeDePaiement)
    {
        $this->modeDePaiement = $modeDePaiement;

        return $this;
    }

    /**
     * Get modeDePaiement
     *
     * @return integer
     */
    public function getModeDePaiement()
    {
        return $this->modeDePaiement;
    }

    /**
     * Set numeroIban
     *
     * @param string $numeroIban
     *
     * @return User
     */
    public function setNumeroIban($numeroIban)
    {
        $this->numeroIban = $numeroIban;

        return $this;
    }

    /**
     * Get numeroIban
     *
     * @return string
     */
    public function getNumeroIban()
    {
        return $this->numeroIban;
    }

    /**
     * Set mandatActif
     *
     * @param boolean $mandatActif
     *
     * @return User
     */
    public function setMandatActif($mandatActif)
    {
        $this->mandatActif = $mandatActif;

        return $this;
    }

    /**
     * Get mandatActif
     *
     * @return boolean
     */
    public function getMandatActif()
    {
        return $this->mandatActif;
    }
    /**
     * @var string
     */
    private $justificatif;


    /**
     * Set justificatif
     *
     * @param string $justificatif
     *
     * @return User
     */
    public function setJustificatif($justificatif)
    {
        $this->justificatif = $justificatif;

        return $this;
    }

    /**
     * Get justificatif
     *
     * @return string
     */
    public function getJustificatif()
    {
        return $this->justificatif;
    }
}
