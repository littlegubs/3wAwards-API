<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * RequestJudge
 *
 * @ORM\Table(name="request_judge")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RequestJudgeRepository")
 * @ApiResource(itemOperations={
 *     "get",
 *     "delete"
 *     },
 *     collectionOperations={
 *     "get",
 *     "post"={"method"="POST"},
 *     },
 *     attributes={
 *     "normalization_context"={"groups"={"requestJudge"}},
 *     "denormalization_context"={"groups"={"requestJudge"}}
 *     })
 */

class RequestJudge
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
     * @Groups({"requestJudge"})
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @var Member
     * @Groups({"requestJudge"})
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Member", inversedBy="requestsJudge")
     */
    private $member;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return Member
     */
    public function getMember(): Member
    {
        return $this->member;
    }

    /**
     * @param Member $member
     */
    public function setMember(Member $member)
    {
        $this->member = $member;
    }



}