<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\ProjectRatingMember;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ProjectRatingMemberFixtures extends Fixture implements OrderedFixtureInterface
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 6;
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
    private function createProjectRatingMember(ObjectManager $manager)
    {
        $projectRatingMember = new ProjectRatingMember();
    }
}
