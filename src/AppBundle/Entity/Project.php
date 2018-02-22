<?php

namespace AppBundle\Entity;

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
     * @ORM\Column(name="publicationDate", type="datetime")
     */
    private $publicationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="mark", type="integer")
     */
    private $mark;

    /**
     * @var string
     *
     * @ORM\Column(name="noticableDescription", type="string", length=255)
     */
    private $noticableDescription;

    /**
     * @var float
     *
     * @ORM\Column(name="averageMark", type="float")
     */
    private $averageMark;

    /**
     * @var int
     *
     * @ORM\Column(name="marksNumber", type="integer")
     */
    private $marksNumber;

    /**
     * @var ProjectRatingMember
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="projectRatingMember")
     */
    private $projectRatingMember;

    /**
     * @var Client
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="project")
     */
    private $client;

    /**
     * @var Agency
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agency", inversedBy="project")
     */
    private $agency;

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
     * Set mark
     *
     * @param integer $mark
     *
     * @return Project
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return int
     */
    public function getMark()
    {
        return $this->mark;
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
     * Set averageMark
     *
     * @param float $averageMark
     *
     * @return Project
     */
    public function setAverageMark($averageMark)
    {
        $this->averageMark = $averageMark;

        return $this;
    }

    /**
     * Get averageMark
     *
     * @return float
     */
    public function getAverageMark()
    {
        return $this->averageMark;
    }

    /**
     * Set marksNumber
     *
     * @param integer $marksNumber
     *
     * @return Project
     */
    public function setMarksNumber($marksNumber)
    {
        $this->marksNumber = $marksNumber;

        return $this;
    }

    /**
     * Get marksNumber
     *
     * @return int
     */
    public function getMarksNumber()
    {
        return $this->marksNumber;
    }

    /**
     * @return ProjectRatingMember
     */
    public function getProjectRatingMember()
    {
        return $this->projectRatingMember;
    }

    /**
     * @param ProjectRatingMember $projectRatingMember
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
}

