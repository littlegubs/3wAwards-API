<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Award;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class AwardFixtures extends Fixture implements OrderedFixtureInterface
{
    private $awards = [
        'Award de la semaine',
        'Award du mois',
        'Award de l\'année',
        '',
        '',
        ''
    ];

    /**
     * @return int
     */
    public function getOrder()
    {
        return 5;
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
    private function createAward(ObjectManager $manager)
    {
        $award = new Award();
    }
}
