<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project
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
     * @ORM\Column(name="projectName", type="string", length=255)
     */
    private $projectName;

    /**
     * @var string
     *
     * @ORM\Column(name="projectDescription", type="text")
     */
    private $projectDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationDate", type="date")
     */
    private $publicationDate;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $averageRating;

    /**
     * @var string
     *
     * @ORM\Column(name="noticableDescription", type="string", length=255)
     */
    private $noticableDescription;

    /**
     * @var ProjectRatingMember[] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProjectRatingMember", mappedBy="project")
     */
    private $projectRatingMember;

    /**
     * @var Client
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="projects")
     */
    private $client;

    /**
     * @var Agency
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agency", inversedBy="projects")
     */
    private $agency;

    /**
     * @var Tag[] | ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="projects")
     */
    private $tags;

    /**
     * @var Image[] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Image")
     * @ORM\JoinTable(name="project_image",
     *     joinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")})
     */
    private $images;

    /**
     * @var Award[] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Award", mappedBy="project")
     */
    private $awards;

    public function __construct()
    {
        $this->awards = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->tags = new ArrayCollection();
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

}

