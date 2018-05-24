<?php

namespace AppBundle\Command;

use AppBundle\Entity\Award;
use AppBundle\Entity\Parameter;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectRatingMember;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;


class AssignmentAwardMonthCommand extends Command
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     *
     * @throws InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('3wawards:assignment_award:month')
            ->setDescription('Launch command for assign award of the month')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime();
        $now = $date->format('Y-m-d');
        $bestRatingProject = 0;
        $min_rating = $this->entityManager->getRepository('AppBundle:Parameter')->findOneBy(['libelle' => 'min_rating']);
        $time_expiry_award = $this->entityManager->getRepository('AppBundle:Parameter')->findOneBy(['libelle' => 'time_expiry_award']);
        $min_project_competition = $this->entityManager->getRepository('AppBundle:Parameter')->findOneBy(['libelle' => 'min_project_competition']);

        $output->writeln('<info>Start assignement award for the month '.$now.'</info>');

        $allProjectRatingMember = $this->entityManager->getRepository('AppBundle:ProjectRatingMember')->findAll();

        if (count($allProjectRatingMember) > $min_project_competition->getValue()) {
            foreach ($allProjectRatingMember as $projectRatingMember) {
                $ratingProject = $projectRatingMember->getProject()->getAverageRating() /
                    $this->countVoteByProjects($allProjectRatingMember, $projectRatingMember->getProject()->getId());
                $isAwardMonth = false;
                foreach ($projectRatingMember->getProject()->getAwards() as $award)
                {
                    if ($award->getType() === 'month' && $date < $award->getDate()->modify('+'.$time_expiry_award->getValue().' day')) {
                        $isAwardMonth = true;
                    }
                }
                if ($ratingProject > $bestRatingProject && $isAwardMonth === false && $projectRatingMember->getProject()->getAverageRating() > $min_rating->getValue()) {
                    $bestRatingProject = $ratingProject;
                    $bestProject = $projectRatingMember->getProject();
                }
            }
        } else {
            $output->writeln('<info>Not enough project</info>');
        }

        if (isset($bestProject)) {
            $newAwardMonth = new Award();
            $newAwardMonth->setDate($date);
            $newAwardMonth->setProject($bestProject);
            $newAwardMonth->setType('month');
            $this->entityManager->persist($newAwardMonth);
            $output->writeln('<info>'.$bestProject->getProjectName().' wins the award for this month</info>');
        } else {
            $output->writeln('<info>No project wins the award for this month</info>');
        }

        $sitesTypes = $this->entityManager->getRepository('AppBundle:SiteType')->findAll();
        $projects = $this->entityManager->getRepository('AppBundle:Project')->findAll();

        $bestRatingProjectBySiteType = 0;

        foreach ($sitesTypes as $siteType) {
            if ($this->countProjectBySiteType($projects, $siteType->getLibelle()) > $min_project_competition->getValue()) {
                $output->writeln('<info>Start assignement award for the best '.$siteType->getLibelle().' </info>');
                $projectsBytype = $this->entityManager->getRepository('AppBundle:Project')->findBy(['siteType' => $siteType]);
                foreach ($projectsBytype as $project) {
                    $ratingProjectBySiteType = $project->getAverageRating() / $this->countVoteByProjects($allProjectRatingMember, $project->getId());
                    if ($ratingProjectBySiteType > $bestRatingProjectBySiteType && $project->getAverageRating() > $min_rating->getValue()) {
                        $bestRatingProjectBySiteType = $ratingProjectBySiteType;
                        $bestProjectBySiteType = $project;

                        $newAwardMonthBySiteType = new Award();
                        $newAwardMonthBySiteType->setDate($date);
                        $newAwardMonthBySiteType->setProject($bestProjectBySiteType);
                        $newAwardMonthBySiteType->setType('month');
                        $category = $this->entityManager->getRepository('AppBundle:Category')->findOneBy(['libelle' => $siteType->getLibelle()]);
                        $newAwardMonthBySiteType->setCategory($category);
                        $this->entityManager->persist($newAwardMonthBySiteType);
                        $output->writeln('<info>'.$bestProjectBySiteType->getProjectName().' is the best '.$siteType->getLibelle().' for this month </info>');
                    }

                }
            } else {
                $output->writeln('<info>No award for the best '.$siteType->getLibelle().' </info>');
            }

        }
        $targets = $this->entityManager->getRepository('AppBundle:Target')->findAll();

        foreach ($targets as $target) {
            if ($this->countProjectByTarget($projects, $target->getLibelle()) > $min_project_competition->getValue()) {
                $output->writeln('<info>Start assignement award for the best '.$target->getLibelle().' </info>');
                $projectByTarget = $this->entityManager->getRepository('AppBundle:Project')->findBy(['target' => $target]);
                $bestRatingProjectByTarget = 0;

                foreach ($projectByTarget as $project) {
                    $ratingProjectByTarget = $project->getAverageRating() / $this->countVoteByProjects($allProjectRatingMember, $project->getId());
                    if ($ratingProjectByTarget > $bestRatingProjectByTarget && $project->getAverageRating() > $min_rating->getValue()) {
                        $bestRatingProjectByTarget = $ratingProjectByTarget;
                        $bestProjectBySiteType = $project;
                        $newAwardMonthBySiteType = new Award();
                        $newAwardMonthBySiteType->setDate($date);
                        $newAwardMonthBySiteType->setProject($bestProjectBySiteType);
                        $newAwardMonthBySiteType->setType('month');
                        $category = $this->entityManager->getRepository('AppBundle:Category')->findOneBy(['libelle' => $target->getLibelle()]);
                        $newAwardMonthBySiteType->setCategory($category);
                        $this->entityManager->persist($newAwardMonthBySiteType);
                        $output->writeln('<info>'.$bestProjectBySiteType->getProjectName().' is the best '.$target->getLibelle().' for this month </info>');
                    }
                }
            }
            else {
                $output->writeln('<info>No award for the best '.$target->getLibelle().' </info>');
            }
        }
        $this->entityManager->flush();
    }

    function countVoteByProjects($allProjectratingMember, $idProject) {
        $nbVotes = 0;
        foreach ($allProjectratingMember as $projectRatingMember) {
            if ($projectRatingMember->getProject()->getId() === $idProject) {
                $nbVotes = $nbVotes + 1;
            }
        }
        return $nbVotes;
    }

    function countProjectBySiteType($projects, $siteType) {
        $nbSite = 0;
        foreach ($projects as $project) {
            if ($project->getSiteType()->getLibelle() === $siteType) {
                $nbSite = $nbSite + 1;
            }
        }
        return $nbSite;
    }

    function countProjectByTarget($projects, $target) {
        $nbSite = 0;
        foreach ($projects as $project) {
            if ($project->getTarget()->getLibelle() === $target) {
                $nbSite = $nbSite + 1;
            }
        }
        return $nbSite;
    }

}