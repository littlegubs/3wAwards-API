<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\CardTrait;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * Agency
 *
 * @ORM\Table(name="agency")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgencyRepository")
 * @ApiResource(itemOperations={
 *     "get"={"method"="GET", "path"="/agency/{id}" },
 *     }, attributes={
 *     "normalization_context"={"groups"={"agency"}},
 *     "denormalization_context"={"groups"={"agency"}}
 *     })
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
     * @var TypeAgency
     * @Groups({"agency"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeAgency", inversedBy="agencies")
     */
    private $typeAgency;

    /**
     * @var Member
     * @Groups({"agency"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Member", inversedBy="agencies")
     */
    private $member;

    /**
     * @var Project[] | ArrayCollection
     * @Groups({"agency"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="agency")
     */
    private $projects;

    /**
     * @var Tag[] | ArrayCollection
     * @Groups({"agency"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="agencies")
     */
    private $tags;

    /**
     * @var Image
     * @Groups({"agency"})
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

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
     * @return TypeAgency
     */
    public function getTypeAgency()
    {
        return $this->typeAgency;
    }

    /**
     * @param TypeAgency $typeAgency
     *
     * @return $this
     */
    public function setTypeAgency($typeAgency)
    {
        $this->typeAgency = $typeAgency;

        return $this;
    }

    /**
     * @return Project[]|ArrayCollection
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param Project[]|ArrayCollection $projects
     *
     * @return $this
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * @return Tag[]|ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag[]|ArrayCollection $tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }
}

