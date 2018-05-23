<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\SiteType;


class SiteTypeFixtures extends Fixture implements OrderedFixtureInterface
{
    private $libelles = [
        'e-commerce ',
        'institutionnel',
        'produit ',
        'événementiel ',
        'communauté ',
        'media ',
        'organisation'
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
            $this->createSiteType($manager, $key);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    private function createSiteType(ObjectManager $manager, $i)
    {
        $siteType = new SiteType();
        $siteType
            ->setLibelle($this->libelles[$i]);
        $manager->persist($siteType);
        $this->addReference('site_type'.$i, $siteType);
    }

}