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
     * @ORM\Column(type="string")
     */
    private $presentation;
    /**
     * @var string
     *
     * @ORM\Column(name="websiteUrl", type="string", length=255)
     */
    private $websiteUrl;

    /**
     * @var bool
     *
     * @ORM\Column(name="newsletter", type="boolean")
     */
    private $newsletter;

    /**
     * @var bool
     *
     * @ORM\Column(name="optIn", type="boolean")
     */
    private $optIn;

    /**
     * @var ProjectRatingMember
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProjectRatingMember", mappedBy="member")
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
    private $profilePicture;

    public function __construct()
    {
        $this->clients  = new ArrayCollection();
        $this->agencies = new ArrayCollection();
        $this->projectRatingMember = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     *
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     *
     * @return $this
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     *
     * @return $this
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     *
     * @return $this
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * @return bool
     */
    public function isJudge()
    {
        return $this->isJudge;
    }

    /**
     * @param bool $isJudge
     *
     * @return $this
     */
    public function setIsJudge($isJudge)
    {
        $this->isJudge = $isJudge;

        return $this;
    }

    /**
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * @param string $presentation
     *
     * @return $this
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * @param string $websiteUrl
     *
     * @return $this
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param bool $newsletter
     *
     * @return $this
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOptIn()
    {
        return $this->optIn;
    }

    /**
     * @param bool $optIn
     *
     * @return $this
     */
    public function setOptIn($optIn)
    {
        $this->optIn = $optIn;

        return $this;
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
     * @return Client|ArrayCollection[]
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param Client|ArrayCollection[] $clients
     *
     * @return $this
     */
    public function setClients($clients)
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * @return Agency|ArrayCollection[]
     */
    public function getAgencies()
    {
        return $this->agencies;
    }

    /**
     * @param Agency|ArrayCollection[] $agencies
     *
     * @return $this
     */
    public function setAgencies($agencies)
    {
        $this->agencies = $agencies;

        return $this;
    }

    /**
     * @return Image
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * @param Image $profilePicture
     *
     * @return $this
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }


}
