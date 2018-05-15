<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Agency;
use AppBundle\Entity\Client;
use AppBundle\Entity\Image;
use AppBundle\Entity\Member;
use AppBundle\Entity\Project;
use Doctrine\Common\DataFixtures\BadMethodCallException;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ProjectFixtures extends Fixture implements OrderedFixtureInterface
{
    private $projects = [
        ['Open Annuaire', '3wAwards', 'That one cool website', 'Project test', 'DataStudio'],
        [
            'Audietis nos dixistis loco iuratis.',
            'Iam exitialis cibos inediae flumen.',
            'Propositum aliis quoque eius neminem.',
            'Enim vivendi Eusebius tribunos Eusebius.',
            'Illorum video fines ut De.',
        ],
        [
            'Sicut Quid Quid cum Quid.',
            'Reque omittam verae inventu istum',
            'Proruperunt hac feris tamen in.',
            'Modum Gallus milites ultra mortalem.',
            'Amplis post quam ut inlustris',

        ],
        /* websiteUrl */
        [
            'https://angular.io/',
            'http://www.nodevo.com/',
            'http://www.cabestan.com/',
            'https://symfony.com/',
            'https://arroi.fr/fr/dusensaloeuvre/',
        ],
    ];

    private $status = [Project::STATUS_PENDING, Project::STATUS_ACCEPTED, Project::STATUS_REFUSED];

    /**
     * @return int*
     */
    public function getOrder()
    {
        return 4;
    }

    /**
     * @param ObjectManager $manager
     *
     * @throws BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $this->createProject($manager, $i);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     *
     * @throws BadMethodCallException
     */
    private function createProject(ObjectManager $manager, $i)
    {
        $project = new Project();

        /** @var Member $member */
        $member = $this->getReference('member_'.rand(1,2));

        /** @var Image $image */
        $image = $this->getReference('image_'.rand(1, 5));

        $project
            ->setProjectName($this->projects[0][$i])
            ->setProjectDescription($this->projects[1][$i])
            ->setPublicationDate(new \DateTime(rand(1, 28).'-'.rand(1, 12).'-'.rand(2012, 2018)))
            ->setAverageRating(rand(1, 100) / 10)
            ->addImage($image)
            ->addMember($member)
            ->setNoticableDescription($this->projects[2][$i])
            ->setProjectUrl($this->projects[3][$i])
            ->setStatus($this->status[rand(0, 2)]);

        if (rand(1, 2) == 1) {
            /** @var Agency $agency */
            $agency = $this->getReference('agency_'.rand(0, 4));
            $project->setAgency($agency);
        } else {
            /** @var Client $client */
            $client = $this->getReference('client_'.rand(0, 4));
            $project->setClient($client);
        }

        $manager->persist($project);
        $this->addReference('project_'.$i, $project);
    }
}
