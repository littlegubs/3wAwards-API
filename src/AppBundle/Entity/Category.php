<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 * @ApiResource(itemOperations={
 *     "get"
 *     }, attributes={
 *     "normalization_context"={"groups"={"category"}},
 *     "denormalization_context"={"groups"={"category"}}
 *     })
 */
class Category
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
     * @Groups({"category"})
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var Award[] | ArrayCollection
     * @Groups({"category"})
     * @ORM\OneToMany(targetEntity="Award", mappedBy="category")
     */
    private $awards;

    /**
     * @var Rating[] | ArrayCollection
     * @Groups({"category"})
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="category")
     */
    private $ratings;

    public function __construct()
    {
        $this->awards = new ArrayCollection();
        $this->ratings = new ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Category
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
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
     * @return Rating
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * @param Rating $ratings
     *
     * @return $this
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;

        return $this;
    }


}

