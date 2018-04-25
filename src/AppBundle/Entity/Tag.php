<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TagRepository")
 * @ApiResource(itemOperations={
 *     "get"
 *     }, attributes={
 *     "normalization_context"={"groups"={"tag"}},
 *     "denormalization_context"={"groups"={"tag"}}
 *     })
 */
class Tag
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
     * @Groups({"tag","member","agency","client"})
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var Agency[] | ArrayCollection
     * @Groups({"tag"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Agency", mappedBy="tags")
     */
    private $agencies;

    /**
     * @var Client[] | ArrayCollection
     * @Groups({"tag"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Client", mappedBy="tags")
     */
    private $clients;


    /**
     * @var Project[] | ArrayCollection
     * @Groups({"tag"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Project", mappedBy="tags")
     */
    private $projects;

    /**
     * @var Member[] | ArrayCollection
     * @Groups({"tag"})
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Member", mappedBy="tags")
     */
    private $members;

    /**
     * @var TypeTag
     * @Groups({"tag", "member"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeTag", inversedBy="tags")
     */
    private $type;

    public function __construct()
    {
        $this->agencies = new ArrayCollection();
        $this->clients = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->members = new ArrayCollection();
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
     * @return Tag
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
     * @return Agency[]|ArrayCollection
     */
    public function getAgencies()
    {
        return $this->agencies;
    }

    /**
     * @param Agency[]|ArrayCollection $agencies
     *
     * @return $this
     */
    public function setAgencies($agencies)
    {
        $this->agencies = $agencies;

        return $this;
    }

    /**
     * @return Client[]|ArrayCollection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param Client[]|ArrayCollection $clients
     *
     * @return $this
     */
    public function setClients($clients)
    {
        $this->clients = $clients;

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
     * @param Project $project
     *
     * @return Tag
     */
    public function addProject($project) {
        if(!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->addTag($this);
        }
        return $this;
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
     * @return TypeTag
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param TypeTag $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Member[]|ArrayCollection
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param Member[]|ArrayCollection $members
     *
     * @return $this
     */
    public function setMembers($members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * @param Member $member
     *
     * @return Tag
     */
    public function addMember($member)
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->addTag($this);
        }

        return $this;
    }


    /**
     * @param Agency $agency
     *
     * @return Tag
     */
    public function addAgency($agency)
    {
        if (!$this->agencies->contains($agency)) {
            $this->agencies[] = $agency;
            $agency->addTag($this);
        }

        return $this;
    }

    /**
     * @param Client $client
     *
     * @return Tag
     */
    public function addClient($client)
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->addTag($this);
        }

        return $this;
    }
}

