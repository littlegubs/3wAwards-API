<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\CardTrait;
/**
 * Agency
 *
 * @ORM\Table(name="agency")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgencyRepository")
 */
class Agency
{
    use CardTrait;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var TypeCompany
     *
     * @ORM\Column(name="typeCompany")
     * @ORM\ManyToOne(targetEntity="TypeCompany", inversedBy="typeCompany")
     */
    private $typeCompany;

    /**
     * @var Member
     *
     * @ORM\Column(name="member")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Member", inversedBy="member")
     */
    private $member;

    /**
     * @var Project
     *
     * @ORM\Column(name="project")
     * @ORM\OneToMany(targetEntity="Project", mappedBy="project")
     */
    private $project;

    /**
     * @var Tag
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="tag")
     */
    private $tags;

    /**
     * @var Image
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

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

