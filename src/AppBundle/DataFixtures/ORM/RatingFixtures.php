<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\Rating;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class RatingFixtures extends Fixture implements OrderedFixtureInterface
{
    private $ratings = [2, 2, 3, 4, 7, 9];

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
        foreach ($this->ratings as $key => $value) {
            $this->createRating($manager, $key);

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
            ->setValue($this->ratings[$i])
            ->setCategory($category);

        $manager->persist($rating);

        $this->addReference('rating'.$i, $rating);
    }
}
