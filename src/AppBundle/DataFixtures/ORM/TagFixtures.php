<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class TagFixtures extends Fixture implements OrderedFixtureInterface
{
    private $tags = [
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
        return 2;
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
    private function createTag(ObjectManager $manager)
    {
        $tag = new Tag();
    }
}
