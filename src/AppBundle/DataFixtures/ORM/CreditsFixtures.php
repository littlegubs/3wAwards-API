<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Client;
use AppBundle\Entity\Credit;
use AppBundle\Entity\Project;
use Doctrine\Common\DataFixtures\BadMethodCallException;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CreditsFixtures extends Fixture implements OrderedFixtureInterface
{
    private $credits = [
        /* lastname */
        ['Leroy', 'Bourgeois', 'Salesse', 'Decourty', 'Robert'],
        /* firstname */
        ['Olivier', 'Lucas', 'William', 'Florian', 'Alexis'],
        /* function */
        ['Intégrateur', 'Lead Dev', 'Graphiste', 'Développeur', 'Client'],

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
     *
     * @throws BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<5; $i++) {
            $this->createCredit($manager, $i);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     *
     * @throws BadMethodCallException
     */
    private function createCredit(ObjectManager $manager, $i)
    {
        /** @var Project $project */
        $project = $this->getReference('project_'.rand(1, 2));

        $credit = new Credit();
        $credit->setLastname($this->credits[0][$i]);
        $credit->setFirstname($this->credits[1][$i]);
        $credit->setFunction($this->credits[2][$i]);


        $manager->persist($credit);
        $this->addReference('credit_'.$i, $credit);
    }
}
