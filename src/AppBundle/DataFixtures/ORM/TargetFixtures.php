<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Target;


class TargetFixtures extends Fixture implements OrderedFixtureInterface
{
    private $libelles = [
        'B2C',
        'B2B',
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
        foreach ($this->libelles as $key => $value) {
            $this->createTarget($manager, $key);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    private function createTarget(ObjectManager $manager, $i)
    {
        $target = new Target();
        $target
            ->setLibelle($this->libelles[$i]);
        $manager->persist($target);
        $this->addReference('target_'.$i, $target);
    }

}