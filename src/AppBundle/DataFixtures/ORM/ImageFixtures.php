<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Agency;
use AppBundle\Entity\Client;
use AppBundle\Entity\Image;
use AppBundle\Entity\Project;
use Doctrine\Common\DataFixtures\BadMethodCallException;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ImageFixtures extends Fixture implements OrderedFixtureInterface
{

    /**
     * @return int*
     */
    public function getOrder()
    {
        return 0;
    }

    /**
     * @param ObjectManager $manager
     *
     * @throws BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; $i++) {
            $this->createImage($manager, $i);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @param int           $i
     */
    private function createImage(ObjectManager $manager, $i)
    {
        $image = new Image();
        $image->setPath('images/project-thumbnail-'.$i.'.jpg')
        ->setLibelle('project-thumbnail-'.$i);

        $manager->persist($image);
        $this->addReference('image_'.$i, $image);
    }
}
