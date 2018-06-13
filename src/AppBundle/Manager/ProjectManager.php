<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Category;
use AppBundle\Entity\Parameter;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectRatingMember;
use Doctrine\ORM\EntityManagerInterface;

class ProjectManager
{
    /**
     * @var string
     */
    protected $rootDir;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Project $project
     *
     * @return Project
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function averageRatingCalculation(Project $project)
    {
        $percentJudge  = $this->em->getRepository(Parameter::class)->find('med_ranking_judges');
        $percentMember = $this->em->getRepository(Parameter::class)->find('med_ranking_members');

        // interactivity
        $project->setAverageInteractivityRatingsJudge($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_INTERACTIVITY, true));
        $project->setAverageInteractivityRatingsMember($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_INTERACTIVITY, false));

        $project->setAverageNavigationRatingsJudge($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_NAVIGATION, true));
        $project->setAverageNavigationRatingsMember($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_NAVIGATION, false));

        $project->setAverageOriginalityRatingsJudge($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_ORIGINALITY, true));
        $project->setAverageOriginalityRatingsMember($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_ORIGINALITY, false));

        $project->setAverageQualityContentRatingsJudge($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_CONTENT_QUALITY, true));
        $project->setAverageQualityContentRatingsMember($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_CONTENT_QUALITY, false));

        $project->setAverageReactivityRatingsJudge($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_REACTIVITY, true));
        $project->setAverageReactivityRatingsMember($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_REACTIVITY, false));

        $project->setAverageReadabilityRatingsJudge($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_READABILITY, true));
        $project->setAverageReadabilityRatingsMember($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_READABILITY, false));

        $project->setAverageWeatlhFunctionalityRatingsJudge($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_FUNCTIONALITY, true));
        $project->setAverageWeatlhFunctionalityRatingsMember($this->em->getRepository(ProjectRatingMember::class)
            ->getAverage($project, Category::CATEGORY_FUNCTIONALITY, false));

        // by users
        $project->setAverageUsersRatings($this->em->getRepository(ProjectRatingMember::class)->getAverage($project, null, false));
        $project->setAverageJudgeRatings($this->em->getRepository(ProjectRatingMember::class)->getAverage($project, null, true));


        $project->setAverageRating(
            round(($project->getAverageJudgeRatings() * ($percentJudge->getValue() / 10)) + ($project->getAverageUsersRatings() * ($percentMember->getValue() / 10))));


        return $project;
    }
}
