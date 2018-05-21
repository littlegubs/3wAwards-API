<?php

namespace AppBundle\Command;

use AppBundle\Entity\Award;
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

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime();
        $now = $date->format('Y-m-d');
        $bestRatingProject = 0;

        $output->writeln('<info>Start assignement award for the day '.$now.'</info>');

        $allProjectRatingMember = $this->entityManager->getRepository('AppBundle:ProjectRatingMember')->findAll();
       foreach ($allProjectRatingMember as $projectRatingMember) {
           $ratingProject = $projectRatingMember->getProject()->getAverageRating() /
               $this->countVoteByProjects($allProjectRatingMember, $projectRatingMember->getProject()->getId());
           if ($ratingProject > $bestRatingProject) {
               $bestRatingProject = $ratingProject;
               $bestProject = $projectRatingMember->getProject();
           }
       }
       $newAward = new Award();
       $newAward->setDate($date);
       $newAward->setProject($bestProject);
       $newAward->setType('day');

       $this->entityManager->persist($newAward);
       $this->entityManager->flush();

        $output->writeln('<info>'.$bestProject->getProjectName().' wins the award for this day</info>');
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