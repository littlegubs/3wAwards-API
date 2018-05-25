<?php

namespace AppBundle\EventListener;

use ApiPlatform\Core\EventListener\EventPriorities;
use AppBundle\Entity\Project;
use AppBundle\Entity\Rating;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RatingListener implements EventSubscriberInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * ConcatCodeListener constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em         = $em;
        $this->repository = $em->getRepository(Rating::class);
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['AverageCalculation', EventPriorities::PRE_WRITE],
        ];
    }

    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function AverageCalculation(GetResponseForControllerResultEvent $event)
    {
        $object = $event->getControllerResult();
        $projects = $this->em->getRepository(Project::class)->findAll();
        dump($projects); die;
    }

}
