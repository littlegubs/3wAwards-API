<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\UserTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Judge
 *
 * @ORM\Table(name="judge")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JudgeRepository")
 */
class Judge
{
    use UserTrait;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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

