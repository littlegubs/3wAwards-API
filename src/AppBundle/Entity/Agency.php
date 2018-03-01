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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Member", inversedBy="agencies")
     */
    private $member;

    /**
     * @var Project
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="agency")
     */
    private $projects;

    /**
     * @var Tag
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="agencies")
     */
    private $tags;

    /**
     * @var Image
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

    /**
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Image $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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

    /**
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @param Member $member
     *
     * @return $this
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return Project
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param Project $projects
     *
     * @return $this
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * @return Tag
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag $tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }
}

