<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\Rating;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class RatingFixtures extends Fixture implements OrderedFixtureInterface
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<9; $i++) {
            $this->createRating($manager, $i);

        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    private function createRating(ObjectManager $manager, $i)
    {
        /** @var Category $category */
        $category = $this->getReference('category_'.rand(0,6));

        $rating = new Rating();
        $rating
            ->setValue(rand(1,10))
            ->setCategory($category);

        $manager->persist($rating);

        $this->addReference('rating_'.$i, $rating);
    }
}
