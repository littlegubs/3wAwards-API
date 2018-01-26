<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agency
 *
 * @ORM\Table(name="agency")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgencyRepository")
 */
class Agency
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     *
     * @return Agency
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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

