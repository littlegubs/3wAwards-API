<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectRatingMember
 *
 * @ORM\Table(name="project_rating_member")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRatingMemberRepository")
 */
class ProjectRatingMember
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="isVoteJudge", type="boolean")
     */
    private $isVoteJudge;

    /**
     * @var Member
     *
     * @ORM\Column(name="member")
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="projectRatingMember")
     */
    private $member;

    /**
     * @var Project
     *
     * @ORM\Column(name="project")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", inversedBy="projectRatingMember")
     */
    private $project;

    /**
     * @var Rating
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rating", inversedBy="projectRatingMember")
     */
    private $rating;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return AwardRatingCategory
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set isVoteJudge
     *
     * @param boolean $isVoteJudge
     *
     * @return AwardRatingCategory
     */
    public function setIsVoteJudge($isVoteJudge)
    {
        $this->isVoteJudge = $isVoteJudge;

        return $this;
    }

    /**
     * Get isVoteJudge
     *
     * @return bool
     */
    public function getIsVoteJudge()
    {
        return $this->isVoteJudge;
    }

    /**
     * @return Category
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * @param Category $ratings
     *
     * @return $this
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;

        return $this;
    }

    /**
     * @return Category
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @param Category $member
     *
     * @return $this
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return Category
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Category $project
     *
     * @return $this
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

}

