<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 *  @ApiResource(itemOperations={
 *     "get", "delete"
 *     }, attributes={
 *     "normalization_context"={"groups"={"client"}},
 *     "denormalization_context"={"groups"={"client"}}
 *     })
 *
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"member"})
     */
    private $id;

    /**
     * @var string
     * @Groups({"client", "project", "award", "member"})
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @Groups({"client", "project", "award"})
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="addressComplement", type="string", length=255, nullable=true)
     */
    private $addressComplement;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="zipcode", type="string", length=255)
     */
    private $zipcode;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="internalNotice", type="string", length=255)
     */
    private $internalNotice;

    /**
     * @var \DateTime
     * @Groups({"client"})
     * @ORM\Column(name="creationDate", type="date")
     */
    private $creationDate;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="websiteUrl", type="string", length=255)
     */
    private $websiteUrl;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="tva", type="string", length=255)
     */
    private $tva;

    /**
     * @var string
     * @Groups({"client"})
     * @ORM\Column(name="duns", type="string", length=255)
     */
    private $duns;

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
     * @ORM\JoinColumn(onDelete="SET NULL")
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
     * @Groups({"client", "member"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="client")
     */
    private $projects;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->projects = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return string
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }


    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return string
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set addressComplement
     *
     * @param string $addressComplement
     *
     * @return string
     */
    public function setAddressComplement($addressComplement)
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    /**
     * Get addressComplement
     *
     * @return string
     */
    public function getAddressComplement()
    {
        return $this->addressComplement;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return string
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return string
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return string
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return string
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return string
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set internalNotice
     *
     * @param string $internalNotice
     *
     * @return string
     */
    public function setInternalNotice($internalNotice)
    {
        $this->internalNotice = $internalNotice;

        return $this;
    }

    /**
     * Get internalNotice
     *
     * @return string
     */
    public function getInternalNotice()
    {
        return $this->internalNotice;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }



    /**
     * Set websiteUrl
     *
     * @param string $websiteUrl
     *
     * @return string
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
     * Set tva
     *
     * @param string $tva
     *
     * @return string
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return string
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set duns
     *
     * @param string $duns
     *
     * @return string
     */
    public function setDuns($duns)
    {
        $this->duns = $duns;

        return $this;
    }

    /**
     * Get duns
     *
     * @return string
     */
    public function getDuns()
    {
        return $this->duns;
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

    /**
     * @return string
     */
    public function getCountry(): string
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
     * @param $tag
     *
     * @return Client
     */
    public function addTag($tag)
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addClient($this);
        }

        return $this;
    }

}

