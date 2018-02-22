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
}

