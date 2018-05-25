<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MemberRepository")
 * @ApiResource(itemOperations={
 *     "get","delete", "put"
 *     },attributes={
 *     "normalization_context"={"groups"={"member"}},
 *     "denormalization_context"={"groups"={"member"}},
 *     "filters"={"member.username_filter"}
 * })
 */
class Member extends BaseUser
{
    /**
     * @var int
     * @Groups({"project"})
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @Groups({"member"})
     * @ORM\Column(name="gender", type="string", length=1, nullable=true)
     */
    private $gender;

    /**
     * @var string
     * @Groups({"member"})
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     * @Groups({"member"})
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     * @Groups({"member"})
     * @ORM\Column(name="birthday", type="date", length=255, nullable=true)
     */
    private $birthday;

    /**
     * @var string
     * @Groups({"member"})
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var bool
     * @Groups({"member"})
     * @ORM\Column(name="isJudge", type="boolean")
     */
    private $isJudge;

    /**
     * @var Tag[] | ArrayCollection
     * @Groups({"member"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="members", cascade={"persist"})
     * @ApiProperty(attributes={"jsonld_context"={"@type"="#Tag[]"}})
     */
    private $tags;

    /**
     * @var Project[] | ArrayCollection
     * @Groups({"member"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Project", mappedBy="members")
     */
    private $favoriteProjects;

    /**
     * @var string
     * @Groups({"member"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $presentation;
    /**
     * @var string
     * @Groups({"member"})
     * @ORM\Column(name="websiteUrl", type="string", length=255, nullable=true)
     */
    private $websiteUrl;

    /**
     * @var string
     * @Groups({"member"})
     * @ORM\Column(name="function", type="string", length=255, nullable=true)
     */
    private $function;

    /**
     * @var bool
     * @Groups({"member"})
     * @ORM\Column(name="newsletter", type="boolean", nullable=true)
     */
    private $newsletter;

    /**
     * @var bool
     * @Groups({"member"})
     * @ORM\Column(name="optIn", type="boolean")
     */
    private $optIn;

    /**
     * @var ProjectRatingMember
     * @Groups({"member"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProjectRatingMember", mappedBy="member")
     * @ApiProperty(attributes={"jsonld_context"={"@type"="#ProjectRatingMember[]"}})
     */
    private $projectRatingMember;

    /**
     * @var Client | ArrayCollection[]
     * @Groups({"member"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Client", mappedBy="member")
     */
    private $clients;

    /**
     * @var Agency | ArrayCollection[]
     * @Groups({"member"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Agency", mappedBy="member")
     */
    private $agencies;

    /**
     * @var Image
     * @Groups({"member"})
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image")
     */
    private $profilePicture;

    public function __construct()
    {
        $this->clients             = new ArrayCollection();
        $this->agencies            = new ArrayCollection();
        $this->projectRatingMember = new ArrayCollection();
        $this->favoriteProjects    = new ArrayCollection();
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
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param string $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
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

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
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
     * @param $tag
     *
     * @return Member
     */
    public function addTag($tag)
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addMember($this);
        }

        return $this;
    }

    /**
     * @return Project[]|ArrayCollection
     */
    public function getFavoriteProjects()
    {
        return $this->favoriteProjects;
    }

    /**
     * @param Project[]|ArrayCollection $favoriteProjects
     *
     * @return $this
     */
    public function setFavoriteProjects($favoriteProjects)
    {
        $this->favoriteProjects = $favoriteProjects;

        return $this;
    }

    /**
     * @param $favoriteProject
     *
     * @return Member
     *
     */
    public function addFavoriteProject($favoriteProject)
    {
        if (!$this->favoriteProjects->contains($favoriteProject)) {
            $this->favoriteProjects[] = $favoriteProject;
            $favoriteProject->addMember($this);
        }

        return $this;
    }
}
