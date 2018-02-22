<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\CardTrait;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 */
class Client
{
    use CardTrait;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Tag
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="clients")
     */
    private $tags;

    /**
     * @var Member
     *
     * @ORM\Column(name="member")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Member", inversedBy="clients")
     */
    private $member;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


}

