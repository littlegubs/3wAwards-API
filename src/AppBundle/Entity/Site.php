<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SiteRepository")
 */
class Site
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
     * @var int
     *
     * @ORM\Column(name="numberLikes", type="integer")
     */
    private $numberLikes;

    /**
     * @var int
     *
     * @ORM\Column(name="numberVisits", type="integer")
     */
    private $numberVisits;

    /**
     * @var int
     *
     * @ORM\Column(name="Accessibility", type="integer")
     */
    private $accessibility;

    /**
     * @var int
     *
     * @ORM\Column(name="technologicalChallenge", type="integer", nullable=true)
     */
    private $technologicalChallenge;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var Award[] | ArrayCollection
     *
     * @ORM\Column(name="awards")
     * @ORM\OneToMany(targetEntity="Award", mappedBy="site")
     */
    private $awards;

    /**
     * @var Picture
     *
     * @ORM\Column(name="image_logo")
     * @ORM\OneToOne(targetEntity="Picture", mappedBy="siteLogo")
     */
    private $imageLogo;

    /**
     * @var Picture
     *
     * @ORM\Column(name="images")
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="site")
     */
    private $images;


    public function __construct()
    {
        $this->awards = new ArrayCollection();
        $this->images = new ArrayCollection();
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
     * Set numberLikes
     *
     * @param integer $numberLikes
     *
     * @return Site
     */
    public function setNumberLikes($numberLikes)
    {
        $this->numberLikes = $numberLikes;

        return $this;
    }

    /**
     * Get numberLikes
     *
     * @return int
     */
    public function getNumberLikes()
    {
        return $this->numberLikes;
    }

    /**
     * Set numberVisits
     *
     * @param integer $numberVisits
     *
     * @return Site
     */
    public function setNumberVisits($numberVisits)
    {
        $this->numberVisits = $numberVisits;

        return $this;
    }

    /**
     * Get numberVisits
     *
     * @return int
     */
    public function getNumberVisits()
    {
        return $this->numberVisits;
    }

    /**
     * Set accessibility
     *
     * @param integer $accessibility
     *
     * @return Site
     */
    public function setAccessibility($accessibility)
    {
        $this->accessibility = $accessibility;

        return $this;
    }

    /**
     * Get accessibility
     *
     * @return int
     */
    public function getAccessibility()
    {
        return $this->accessibility;
    }

    /**
     * Set technologicalChallenge
     *
     * @param integer $technologicalChallenge
     *
     * @return Site
     */
    public function setTechnologicalChallenge($technologicalChallenge)
    {
        $this->technologicalChallenge = $technologicalChallenge;

        return $this;
    }

    /**
     * Get technologicalChallenge
     *
     * @return int
     */
    public function getTechnologicalChallenge()
    {
        return $this->technologicalChallenge;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Site
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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
     * @return Picture
     */
    public function getImageLogo()
    {
        return $this->imageLogo;
    }

    /**
     * @param Picture $imageLogo
     *
     * @return $this
     */
    public function setImageLogo($imageLogo)
    {
        $this->imageLogo = $imageLogo;

        return $this;
    }

    /**
     * @return Picture
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param Picture $images
     *
     * @return $this
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }


}

