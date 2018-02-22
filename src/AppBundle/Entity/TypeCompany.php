<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeCompany
 *
 * @ORM\Table(name="type_company")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeCompanyRepository")
 */
class TypeCompany
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var Agency[] | ArrayCollection
     *
     * @ORM\Column(name="agencies")
     * @ORM\OneToMany(targetEntity="Agency", mappedBy="typeCompany")
     */
    private $agencies;

    /**
     * @var Owner[] | ArrayCollection
     *
     * @ORM\Column(name="owners")
     * @ORM\OneToMany(targetEntity="Owner", mappedBy="typeCompany")
     */
    private $owners;

    /**
     * @var Agency
     *
     * @ORM\Column(name="agency")
     * @ORM\OneToMany(targetEntity="Agency", mappedBy="agency")
     */
    private $agency;


    public function __construct()
    {
        $this->agencies = new ArrayCollection();
        $this->owners = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypeCompany
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @return Agency
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param Agency $agency
     *
     * @return $this
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;

        return $this;
    }
}

