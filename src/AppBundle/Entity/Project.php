<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 * @ApiResource(
 *     itemOperations={
 *     "get"
 *     },
 *     collectionOperations={
 *     "get",
 *     "post"={"method"="POST"},
 *     },
 *     attributes={
 *     "order"={"publicationDate": "DESC"},
 *     "pagination_items_per_page"=12,
 *     "normalization_context"={"groups"={"project"}},
 *     "denormalization_context"={"groups"={"project"}},
 *     "filters"={"project.status_filter", "project.agency_name_filter", "project.client_name_filter", "project.project_rating_member_id", "project.project_favorite_member"}
 *     })
 */

class Project
{
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REFUSED = 'refused';

    /**
     * @var int
     * @Groups({"award"})
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Groups({"project", "award", "member"})
     * @ORM\Column(name="projectName", type="string", length=255)
     */
    private $projectName;

    /**
     * @var string
     * @Groups({"project"})
     * @ORM\Column(name="projectDescription", type="text")
     */
    private $projectDescription;

    /**
     * @var \DateTime
     * @Groups({"project"})
     * @ORM\Column(name="publicationDate", type="date")
     */
    private $publicationDate;

    /**
     * @var float
     * @Groups({"project"})
     * @ORM\Column(type="float", nullable=true)
     */
    private $averageRating;

    /**
     * @var string
     * @Groups({"project"})
     * @ORM\Column(name="noticableDescription", type="string", length=255)
     */
    private $noticableDescription;

    /**
     * @var string
     * @Groups({"project"})
     * @ORM\Column(name="status", type="string")
     */
    private $status = self::STATUS_PENDING;
    /**
     * @var ProjectRatingMember[] | ArrayCollection
     * @Groups({"project"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProjectRatingMember", mappedBy="project")
     */
    private $projectRatingMember;

    /**
     * @var Client
     * @Groups({"project", "award"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="projects")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $client;

    /**
     * @var Agency
     * @Groups({"project", "award"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agency", inversedBy="projects")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $agency;

    /**
     * @var Tag[] | ArrayCollection
     * @Groups({"project"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="projects", cascade={"persist"})
     * @ApiProperty(attributes={"jsonld_context"={"@type"="#Tag[]"}})
     */
    private $tags;

    /**
     * @var Credit[] | ArrayCollection
     * @Groups({"project"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Credit", inversedBy="projects", cascade={"persist"})
     * @ApiProperty(attributes={"jsonld_context"={"@type"="#Credit[]"}})
     */
    private $credits;

    /**
     * @var Member[] | ArrayCollection
     * @Groups({"project"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Member", inversedBy="favoriteProjects")
     */
    private $members;

    /**
     * @var Image[] | ArrayCollection
     * @Groups({"project", "award"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Image")
     * @ORM\JoinTable(name="project_image",
     *     joinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")})
     */
    private $images;

    /**
     * @var Award[] | ArrayCollection
     * @Groups({"project", "client", "agency", "member"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Award", mappedBy="project")
     */
    private $awards;

    /**
     * @var string
     * @Groups({"project"})
     * @ORM\Column(name="projectUrl", type="text")
     */
    private $projectUrl;

    public function __construct()
    {
        $this->awards = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->credits = new ArrayCollection();
        $this->members = new ArrayCollection();
        $this->projectRatingMember = new ArrayCollection();
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
     * Set projectName
     *
     * @param string $projectName
     *
     * @return Project
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set projectDescription
     *
     * @param string $projectDescription
     *
     * @return Project
     */
    public function setProjectDescription($projectDescription)
    {
        $this->projectDescription = $projectDescription;

        return $this;
    }

    /**
     * Get projectDescription
     *
     * @return string
     */
    public function getProjectDescription()
    {
        return $this->projectDescription;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     *
     * @return Project
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set noticableDescription
     *
     * @param string $noticableDescription
     *
     * @return Project
     */
    public function setNoticableDescription($noticableDescription)
    {
        $this->noticableDescription = $noticableDescription;

        return $this;
    }

    /**
     * Get noticableDescription
     *
     * @return string
     */
    public function getNoticableDescription()
    {
        return $this->noticableDescription;
    }

    /**
     * @return float
     */
    public function getAverageRating()
    {
        return $this->averageRating;
    }

    /**
     * @param float $averageRating
     *
     * @return $this
     */
    public function setAverageRating($averageRating)
    {
        $this->averageRating = $averageRating;

        return $this;
    }

    /**
     * @return ProjectRatingMember[]|ArrayCollection
     */
    public function getProjectRatingMember()
    {
        return $this->projectRatingMember;
    }

    /**
     * @param ProjectRatingMember[]|ArrayCollection $projectRatingMember
     *
     * @return $this
     */
    public function setProjectRatingMember($projectRatingMember)
    {
        $this->projectRatingMember = $projectRatingMember;

        return $this;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     *
     * @return $this
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
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

    /**
     * @return Tag[]|ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return Credit[]|ArrayCollection
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param Credit[]|ArrayCollection $credits
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }


    /**
     * @param Tag $tag
     *
     * @return Project
     */
    public function addTag($tag)
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addProject($this);
        }
        return $this;
    }

    /**
     * @param Credit $credit
     *
     * @return Project
     */
    public function addCredit($credit)
    {
        if (!$this->tags->contains($credit)) {
            $this->credits[] = $credit;
            $credit->addProject($this);
        }
        return $this;
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

    /**
     * @return Image[]|ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param Image $image
     *
     * @return Project
     */
    public function addImage($image)
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
        }

        return $this;
    }

    /**
     * @param Image[]|ArrayCollection $images
     *
     * @return $this
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return Award[]|ArrayCollection
     */
    public function getAwards()
    {
        return $this->awards;
    }

    /**
     * @param Award[]|ArrayCollection $awards
     *
     * @return $this
     */
    public function setAwards($awards)
    {
        $this->awards = $awards;

        return $this;
    }

    /**
     * @return string
     */
    public function getProjectUrl()
    {
        return $this->projectUrl;
    }

    /**
     * @param string $projectUrl
     *
     * @return $this
     */
    public function setProjectUrl($projectUrl)
    {
        $this->projectUrl = $projectUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * @return Project[]|ArrayCollection
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param Project[]|ArrayCollection $members
     *
     * @return $this
     */
    public function setMembers($members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * @param $member
     *
     * @return Project
     *
     */
    public function addMember($member)
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
        }

        return $this;
    }

}

