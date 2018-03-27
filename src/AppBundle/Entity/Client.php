<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\CardTrait;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 *  @ApiResource(itemOperations={
 *     "get"={"method"="GET", "path"="/client/{id}" },
 *     }, attributes={
 *     "normalization_context"={"groups"={"client"}},
 *     "denormalization_context"={"groups"={"client"}}
 *     })
 *
 */
class Client
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
     * @var Tag[] | ArrayCollection
     * @Groups({"client"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="clients")
     */
    private $tags;

    /**
     * @var Member
     * @Groups({"client"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Member", inversedBy="clients")
     */
    private $member;

    /**
     * @var Image
     * @Groups({"client"})
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

    /**
     * @var Project[] | ArrayCollection
     * @Groups({"client"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="client")
     */
    private $projects;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->projects = new ArrayCollection();
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
     * @return Tag[]
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
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Image $image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

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



}

