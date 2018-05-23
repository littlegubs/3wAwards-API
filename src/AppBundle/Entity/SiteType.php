<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * SiteTypeRepository
 *
 * @ORM\Table(name="site_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SiteTypeRepository")
 * @ApiResource(itemOperations={
 *     "get",
 *     },
 *     collectionOperations={
 *     "get",
 *     "post"={"method"="POST"},
 *     },
 *     attributes={
 *     "normalization_context"={"groups"={"siteType"}},
 *     "denormalization_context"={"groups"={"siteType"}}
 *     })
 */
class SiteType
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
     * @Groups({"siteType", "project"})
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var Project[] | ArrayCollection
     * @Groups({"siteType"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="siteType")
     */
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
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
     * @return SiteType
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
     * @return Tag[]|ArrayCollection
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param Tag[]|ArrayCollection $projects
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
    }




}

