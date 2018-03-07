<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\TypeAgency;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class TypeAgencyFixtures extends Fixture implements OrderedFixtureInterface
{
    private $typeAgencies = [
        'web_agency',
        'ssii',
        'tpe',
        'pme',
        'large_company',
        'esn'
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
        foreach ($this->typeAgencies as $key => $value) {
            $this->createTypeAgency($manager, $key);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @param  int $i
     */
    private function createTypeAgency(ObjectManager $manager, $i)
    {
        $typeAgency = new TypeAgency();
        $typeAgency->setLibelle($this->typeAgencies[$i]);

        $manager->persist($typeAgency);
        $this->addReference('type_agency_'.$i, $typeAgency);
    }
}
