<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Award;
use AppBundle\Entity\Category;
use AppBundle\Entity\Project;
use Doctrine\Common\DataFixtures\BadMethodCallException;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class AwardFixtures extends Fixture implements OrderedFixtureInterface
{
    private $awards = [
        Award::TYPE_DAY,
        Award::TYPE_MONTH,
        Award::TYPE_YEAR
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
     *
     * @throws BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->awards as $key => $value) {
            $this->createAward($manager, $key, $value);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     *
     * @throws BadMethodCallException
     */
    private function createAward(ObjectManager $manager, $i, $type)
    {
        /** @var Category $category */
        $category = $this->getReference('category_'.rand(0, 6));
        /** @var Project $project */
        $project = $this->getReference('project_'.rand(0, 4));

        $award = new Award();
        $award->setDate(new \DateTime(rand(1, 28).'-'.rand(1, 12).'-'.rand(2012, 2018)))
            ->setCategory($category)
            ->setType($type);
        $award->setProject($project);

        $manager->persist($award);
        $this->addReference('award_'.$i, $award);
    }
}
