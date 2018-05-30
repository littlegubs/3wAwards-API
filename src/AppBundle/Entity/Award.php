<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * Award
 *
 * @ORM\Table(name="award")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AwardRepository")
 * @ApiResource(itemOperations={
 *     "get"
 *     }, attributes={
 *     "normalization_context"={"groups"={"award"}},
 *     "denormalization_context"={"groups"={"award"}},
 *     "order"={"date": "ASC"},
 *     "pagination_items_per_page"=7,
 *     "filters"={"award.type_filter"}
 *     })
 */
class Award
{
    const TYPE_DAY = 'day';
    const TYPE_WEEK =  'week';
    const TYPE_MONTH =  'month';
    const TYPE_JURY = 'jury';

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
     * @Groups({"award", "member", "project"})
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var Category
     * @Groups({"award", "member", "project"})
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="awards", cascade={"persist"})
     */
    private $category;

    /**
     * @var string
     * @Groups({"award", "member", "project"})
     * @ORM\Column(name="type")
     */
    private $type;

    /**
     * @var Project
     * @Groups({"award"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", inversedBy="awards")
     */
    private $project;



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
     * @return Award
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
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param type $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     *
     * @return $this
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }


}

