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

class AssignmentAwardDayCommand extends Command
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
            ->setName('3wawards:assignment_award:day')
            ->setDescription('Launch command for assign award of the day')
        ;
    }

    /***
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime();
        $now = $date->format('Y-m-d');
        $bestRatingProject = 0;
        $min_rating = $this->entityManager->getRepository('AppBundle:Parameter')->findOneBy(['libelle' => 'min_rating']);
        $time_expiry_award = $this->entityManager->getRepository('AppBundle:Parameter')->findOneBy(['libelle' => 'time_expiry_award']);
        $min_project_competition = $this->entityManager->getRepository('AppBundle:Parameter')->findOneBy(['libelle' => 'min_project_competition']);

        $output->writeln('<info>Start assignement award for the day '.$now.'</info>');

        $allProjectRatingMember = $this->entityManager->getRepository('AppBundle:ProjectRatingMember')->findAll();

        if (count($allProjectRatingMember) > $min_project_competition->getValue()) {
            foreach ($allProjectRatingMember as $projectRatingMember) {
                $ratingProject = $projectRatingMember->getProject()->getAverageRating() /
                    $this->countVoteByProjects($allProjectRatingMember, $projectRatingMember->getProject()->getId());
                $isAwardDay = false;
                foreach ($projectRatingMember->getProject()->getAwards() as $award)
                {
                    if ($award->getType() === 'day' && $date < $award->getDate()->modify('+'.$time_expiry_award->getValue().' day')) {
                        $isAwardDay = true;
                    }
                }
                if ($ratingProject > $bestRatingProject && $isAwardDay === false && $projectRatingMember->getProject()->getAverageRating() > $min_rating->getValue()) {
                    $bestRatingProject = $ratingProject;
                    $bestProject = $projectRatingMember->getProject();
                }
            }
        } else {
            $output->writeln('<info>Not enough project</info>');
        }

       if (isset($bestProject)) {
           $newAward = new Award();
           $newAward->setDate($date);
           $newAward->setProject($bestProject);
           $newAward->setType('day');

           $this->entityManager->persist($newAward);
           $this->entityManager->flush();
           $output->writeln('<info>'.$bestProject->getProjectName().' wins the award for this day</info>');
       } else {
           $output->writeln('<info>No project wins the award for this day</info>');
       }
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



}