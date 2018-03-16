<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Project;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ProjectFixtures extends Fixture implements OrderedFixtureInterface
{
    private $projects = [
        ['Open-Annuaire', '3wAwards', 'Adav', 'VisionDrone' ,'DataStudio'],
        [
            'Audietis nos dixistis loco iuratis.',
            'Iam exitialis cibos inediae flumen.',
            'Propositum aliis quoque eius neminem.',
            'Enim vivendi Eusebius tribunos Eusebius.',
            'Illorum video fines ut De.'
        ],
        [
            'Sicut Quid Quid cum Quid.',
            'Reque omittam verae inventu istum',
            'Proruperunt hac feris tamen in.',
            'Modum Gallus milites ultra mortalem.',
            'Amplis post quam ut inlustris',

        ],
    ];

    /**
     * @return int*
     */
    public function getOrder()
    {
        return 4;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<4; $i++) {
            $this->createProject($manager, $i);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    private function createProject(ObjectManager $manager, $i)
    {
        $project = new Project();

        $project
            ->setProjectName($this->projects[0][$i])
            ->setProjectDescription($this->projects[1][$i])
            ->setPublicationDate(new \DateTime(rand(1, 28).'-'.rand(1, 12).'-'.rand(2012, 2018)))
            ->setAverageRating(rand(1,100)/10)
            ->setNoticableDescription($this->projects[2][$i]);

        $manager->persist($project);
        $this->addReference('project_'.$i, $project);

    }
}
