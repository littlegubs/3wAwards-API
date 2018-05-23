<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\BadMethodCallException;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    private $categories = [
        'creativity',
        'graphism',
        'ergonomy',
        'interactivity',
        'contents_quality',
        'fonctionnality_quality',
        'reactivity',
        'e-commerce ',
        'institutionnel',
        'produit ',
        'événementiel ',
        'communauté ',
        'media ',
        'organisation',
        'B2B',
        'B2C'
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
     *
     * @throws BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->categories as $key => $value) {
            $this->createCategory($manager, $key);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @param int           $i
     *
     * @throws BadMethodCallException
     */
    private function createCategory(ObjectManager $manager, $i)
    {
        $category = new Category();
        $category->setLibelle($this->categories[$i]);

        $manager->persist($category);
        $this->addReference('category_'.$i, $category);
    }
}
