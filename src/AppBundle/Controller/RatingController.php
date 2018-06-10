<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Parameter;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectRatingMember;
use AppBundle\Manager\FileManager;
use AppBundle\Manager\ProjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RatingController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ProjectManager
     */
    private $projectManager;
    /**
     * constructor.
     *
     * @param EntityManagerInterface $em
     * @param ProjectManager         $projectManager
     */
    public function __construct(EntityManagerInterface $em, ProjectManager $projectManager)
    {
        $this->em = $em;
        $this->projectManager = $projectManager;
    }

    /**
     * @param Request $request
     *
     * @param         $id
     *
     * @return Project|null|object
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @Route(
     *     name="average",
     *     path="/average/{id}",
     *     methods={"GET"}
     * )
     */
    public function __invoke(Request $request, $id)
    {
        $project = $this->em->getRepository(Project::class)->find($id);
        $project = $this->projectManager->averageRatingCalculation($project);

        $this->em->persist($project);
        $this->em->flush();
        $ratings = [
            $project->getAverageJudgeRatings(),
            $project->getAverageUsersRatings(),
            $project->getAverageRating(),
            $project->getAverageOriginalityRatingsJudge(),
            $project->getAverageReadabilityRatingsJudge(),
            $project->getAverageNavigationRatingsJudge(),
            $project->getAverageInteractivityRatingsJudge(),
            $project->getAverageQualityContentRatingsJudge(),
            $project->getAverageWeatlhFunctionalityRatingsJudge(),
            $project->getAverageReactivityRatingsJudge(),
            $project->getAverageOriginalityRatingsMember(),
            $project->getAverageReadabilityRatingsMember(),
            $project->getAverageNavigationRatingsMember(),
            $project->getAverageInteractivityRatingsMember(),
            $project->getAverageQualityContentRatingsMember(),
            $project->getAverageWeatlhFunctionalityRatingsMember(),
            $project->getAverageReactivityRatingsMember(),
        ];
        return new JsonResponse($ratings);
    }
}
