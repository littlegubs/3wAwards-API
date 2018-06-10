<?php

namespace AppBundle\EventListener;

use ApiPlatform\Core\EventListener\EventPriorities;
use AppBundle\Entity\Project;
use AppBundle\Entity\Rating;
use AppBundle\Manager\ProjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
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

    /** @var ProjectManager */
    protected $projectManager;

    /**
     * ConcatCodeListener constructor.
     *
     * @param EntityManagerInterface $em
     * @param ProjectManager         $projectManager
     */
    public function __construct(EntityManagerInterface $em, ProjectManager $projectManager)
    {
        $this->em         = $em;
        $this->repository = $em->getRepository(Project::class);
        $this->projectManager = $projectManager;
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
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function AverageCalculation(GetResponseForControllerResultEvent $event)
    {
        $object = $event->getControllerResult();
        $request = $event->getRequest();
        if ($object instanceof Project & Request::METHOD_GET === $event->getRequest()->getMethod() & $request->query->get('averageRatings') == true) {
            $project = $this->projectManager->averageRatingCalculation($object);
            $this->em->persist($project);
            $this->em->flush();
        }
    }

}
