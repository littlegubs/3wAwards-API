<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Agency;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class AgencyFixtures extends Fixture implements OrderedFixtureInterface
{
    private $agencies = [
        '',
        '',
        '',
        '',
        '',
        ''
    ];

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
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
    private function createAgency(ObjectManager $manager)
    {
        $agency = new Agency();
    }

}
