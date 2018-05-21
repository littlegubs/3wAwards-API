<?php

namespace AppBundle\Command;

use AppBundle\Entity\Award;
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

        $output->writeln('<info>Start assignement award for the day '.$now.'</info>');

       $AllprojectRatingMember = $this->entityManager->getRepository('AppBundle:ProjectRatingMember')->findAll();


       $newAward = new Award();
       $newAward->setDate($date);
       $newAward->setType('day');

       $this->entityManager->persist($newAward);
       $this->entityManager->flush();

    }



}