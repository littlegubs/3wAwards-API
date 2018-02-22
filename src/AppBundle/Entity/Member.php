<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MemberRepository")
 */
class Member
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
     * @ORM\Column(name="gender", type="string", length=1)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="birthday", type="string", length=255)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var bool
     *
     * @ORM\Column(name="isAdmin", type="boolean")
     */
    private $isAdmin;

    /**
     * @var bool
     *
     * @ORM\Column(name="isJudge", type="boolean")
     */
    private $isJudge;

    /**
     * @var string
     *
     * @ORM\Column(name="websiteUrl", type="string", length=255)
     */
    private $websiteUrl;

    /**
     * @var bool
     *
     * @ORM\Column(name="notification", type="boolean")
     */
    private $notification;

    /**
     * @var bool
     *
     * @ORM\Column(name="optIn", type="boolean")
     */
    private $optIn;

    /**
     * @var ProjectRatingMember
     *
     * @ORM\Column(name="projectRatingMember", type="ProjectRatingMember")
     */
    private $projectRatingMember;

    /**
     * @var Client | ArrayCollection[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Client", mappedBy="member")
     */
    private $clients;

    /**
     * @var Agency | ArrayCollection[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Agency", mappedBy="member")
     */
    private $agencies;

    /**
     * @var Image
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", inversedBy="member")
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
     * Set gender
     *
     * @param string $gender
     *
     * @return Member
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Member
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Member
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     *
     * @return Member
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Member
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     *
     * @return Member
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get $isAdmin
     *
     * @return bool
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set isJudge
     *
     * @param boolean $isJury
     *
     * @return Member
     */
    public function setIsJudge($isJudge)
    {
        $this->isJudge = $isJudge;

        return $this;
    }

    /**
     * Get isJudge
     *
     * @return bool
     */
    public function getIsJudge()
    {
        return $this->isJudge;
    }

    /**
     * Set websiteUrl
     *
     * @param string $websiteUrl
     *
     * @return Member
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    /**
     * Get websiteUrl
     *
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * Set notification
     *
     * @param boolean $notification
     *
     * @return Member
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get notification
     *
     * @return bool
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set optIn
     *
     * @param boolean $optIn
     *
     * @return Member
     */
    public function setOptIn($optIn)
    {
        $this->optIn = $optIn;

        return $this;
    }

    /**
     * Get optIn
     *
     * @return bool
     */
    public function getOptIn()
    {
        return $this->optIn;
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
     * @return Member
     */
    public function getMember()
    {
        return $this->Member;
    }

    /**
     * @param Member $Member
     *
     * @return $this
     */
    public function setMember($Member)
    {
        $this->Member = $Member;

        return $this;
    }
}

