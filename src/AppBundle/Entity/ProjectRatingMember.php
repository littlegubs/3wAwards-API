<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * ProjectRatingMember
 *
 * @ORM\Table(name="project_rating_member")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRatingMemberRepository")
 * @ApiResource( itemOperations={
 *     "get",
 *     "put"={"method"="PUT"},
 *     "delete"
 *     },
 *      collectionOperations={
 *     "get",
 *     "post"={"method"="POST"},
 *     },
 *      attributes={
 *     "normalization_context"={"groups"={"project-rating-member"}},
 *     "denormalization_context"={"groups"={"project-rating-member"}}
 *     })
 */
class ProjectRatingMember
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @Groups({"project-rating-member", "member"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @Groups({"project-rating-member", "project"})
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var bool
     * @Groups({"project-rating-member", "member", "project"})
     * @ORM\Column(name="voteJudge", type="boolean")
     */
    private $voteJudge;

    /**
     * @var Member
     * @Groups({"project-rating-member", "project", "member"})
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="projectRatingMember")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $member;

    /**
     * @var Project
     * @Groups({"project-rating-member", "member"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", inversedBy="projectRatingMember")
     */
    private $project;

    /**
     * @var Rating
     * @Groups({"project-rating-member", "member"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rating", inversedBy="projectRatingMember", cascade={"persist"})
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return bool
     */
    public function isVoteJudge()
    {
        return $this->voteJudge;
    }

    /**
     * @param bool $voteJudge
     *
     * @return $this
     */
    public function setVoteJudge($voteJudge)
    {
        $this->voteJudge = $voteJudge;

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
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     *
     * @return $this
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return Rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param Rating $rating
     *
     * @return $this
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }


}

