<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Project;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ProjectFixtures extends Fixture implements OrderedFixtureInterface
{
    private $projects = [
        '',
        '',
        '',
        '',
        '',
        ''
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

    }

    /**
     * @param ObjectManager $manager
     */
    private function createProject(ObjectManager $manager)
    {
        $project = new Project();
    }
}
