<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

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
 * })
 * @ApiFilter(SearchFilter::class, properties={"libelle": "exact"})
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"category"})
     */
    private $id;

    /**
     * @var string
     * @Groups({"category", "member", "project-rating-member", "project"})
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

