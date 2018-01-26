<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\UserTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Owner
 *
 * @ORM\Table(name="owner")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OwnerRepository")
 */
class Owner
{
    use UserTrait;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_professional", type="boolean")
     */
    private $isProfessional;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", nullable=true)
     */
    private $companyName;

    /**
     * @var TypeCompany
     *
     * @ORM\Column(name="type_company")
     * @ORM\ManyToOne(targetEntity="TypeCompany", inversedBy="agencies")
     */
    private $typeCompany;


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
     * @return bool
     */
    public function isProfessional()
    {
        return $this->isProfessional;
    }

    /**
     * @param bool $isProfessional
     *
     * @return $this
     */
    public function setIsProfessional($isProfessional)
    {
        $this->isProfessional = $isProfessional;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     *
     * @return $this
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return TypeCompany
     */
    public function getTypeCompany()
    {
        return $this->typeCompany;
    }

    /**
     * @param TypeCompany $typeCompany
     *
     * @return $this
     */
    public function setTypeCompany($typeCompany)
    {
        $this->typeCompany = $typeCompany;

        return $this;
    }


}

