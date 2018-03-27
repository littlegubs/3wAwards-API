<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ProjectController constructor.
     *
     * @param  ProjectRepository $projectRepository
     */
    public function __construct( ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @Route(
     *     name="twelve-last-projects",
     *     path="/project/twelve-last-projects",
     *     methods={"GET"}
     * )
     *
     *  @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $projects = $this->projectRepository->lastTwelveProjects();

        return new JsonResponse([
            'projects' => $projects,
        ]);
    }
}