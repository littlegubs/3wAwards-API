<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\TypeTag;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class TypeTagsFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    private $typeTags = [
        'site_type',
        'purpose',
        'business_sector',
        'target',
        'language',
        'budget_fork',
        'color',
        'style',
        'behavior',
        'accessibility',
        'agency_mission',
        'custom',
        'main_fonctionnality',
        'front_tech',
        'back_tech',
        'cms',
        'challenge'
    ];

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->typeTags as $key => $value) {
            $this->createTypeTag($manager, $key);

        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @param  int $i
     */
    private function createTypeTag(ObjectManager $manager, $i)
    {
        $typeTag = new TypeTag();
        $typeTag->setLibelle($this->typeTags[$i]);

        $manager->persist($typeTag);
        $this->addReference('type_tag_'.$i, $typeTag);
    }
}
