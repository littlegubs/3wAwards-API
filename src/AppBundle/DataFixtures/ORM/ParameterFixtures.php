<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Parameter;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ParameterFixtures extends Fixture implements OrderedFixtureInterface
{
    private $parameters = [
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
        return 0;
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
    private function createParameter(ObjectManager $manager)
    {
        $parameter = new Parameter();
    }
}
