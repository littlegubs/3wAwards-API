<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * TypeAgency
 *
 * @ORM\Table(name="type_agency")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeAgencyRepository")
 * @ApiResource(itemOperations={
 *     "get"
 *     }, attributes={
 *     "normalization_context"={"groups"={"type-agency"}},
 *     "denormalization_context"={"groups"={"type-agency"}}
 *     })
 */
class TypeAgency
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
     * @Groups({"type-agency"})
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var Agency[] | ArrayCollection
     * @Groups({"type-agency"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Agency", mappedBy="typeAgency")
     */
    private $agencies;

    public function __construct()
    {
        $this->agencies = new ArrayCollection();
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
     * @return TypeAgency
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
     * @return Agency[]|ArrayCollection
     */
    public function getAgencies()
    {
        return $this->agencies;
    }

    /**
     * @param Agency[]|ArrayCollection $agencies
     *
     * @return $this
     */
    public function setAgencies($agencies)
    {
        $this->agencies = $agencies;

        return $this;
    }


}

