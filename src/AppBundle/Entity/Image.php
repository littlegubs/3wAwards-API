<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImageRepository")
 * @ApiResource(
 *     itemOperations={
 *     "get",
 *     "put"={"method"="PUT"},
 *     "delete"
 *     },
 *     collectionOperations={
 *     "get",
 *     "post"={"method"="POST"},
 *     }, attributes={
 *     "normalization_context"={"groups"={"image"}},
 *     "denormalization_context"={"groups"={"image"}}
 *     })
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @Groups({"image", "project", "award", "member"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Groups({"image", "project", "award", "member", "agency", "client"})
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @var string
     * @Groups({"image", "project", "client", "agency", "member"})
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;


    /**
     * @var int
     * @Groups({"image", "project"})
     * @ORM\Column(nullable=true, type="integer")
     */
    private $position;

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
     * @return Image
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     *
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }


}

