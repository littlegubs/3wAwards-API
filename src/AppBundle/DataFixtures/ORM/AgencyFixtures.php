<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Agency;
use AppBundle\Entity\Member;
use AppBundle\Entity\TypeAgency;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class AgencyFixtures extends Fixture implements OrderedFixtureInterface
{
    private $agencies = [
        /* name */
        ['Cabestan', 'MentalWorks', 'Arroi', 'Nodevo', 'Capgemini'],
        /* adress */
        ['7 Quai André Citroën', 'Rue Irène Joliot Curie', '27 Rue Saint-Pierre', '1 Avenue du Général de Gaulle', '11 Rue de Tilsitt'],
        /* zipcode */
        ['75015', '60200', '60300', '60500', '75017'],
        /* phone */
        ['0672050405', '0680063960', '0344263672', '0344862255', '0170649690'],
        /* city */
        ['Paris', 'Senlis', 'Lamorlaye', 'Gouvieux', 'Chaumontel'],
        /* description */
        [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
            'quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo',
            'consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt',
            'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally',
            'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium'
        ],
        /* internalNotice */
        [
            'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus',
            'On the other hand, we denounce with righteous indignation and dislike',
            'perfectly simple and easy to distinguish. In a free hour, when our power',
            'which of us ever undertakes laborious physical exercise',
            'Quis autem vel eum iure reprehenderit qui in ea voluptate',
        ],
        /* websiteUrl */
        ['https://angular.io/', 'http://www.nodevo.com/', 'http://www.cabestan.com/', 'https://symfony.com/', 'https://arroi.fr/fr/dusensaloeuvre/'],
        /* tva */
        ['12345678901', 'X1234567890', '1X123456789', 'XX123456789', '0987654321'],
        /* duns*/
        ['123456789', '987654321', '678912345', '987612345', '123498765' ],

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
        for ($i=0; $i<4; $i++) {
            $this->createAgency($manager, $i);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    private function createAgency(ObjectManager $manager, $i)
    {
        /** @var TypeAgency $typeAgency */
        $typeAgency = $this->getReference('type_agency_'.rand(0,4));

        /** @var Member $member */
       // $member = $this->getReference('member_'.rand(0,2));


        $agency = new Agency();
        $agency
            ->setName($this->agencies[0][$i])
            ->setAddress($this->agencies[1][$i])
            ->setZipcode($this->agencies[2][$i])
            ->setPhone($this->agencies[3][$i])
            ->setCity($this->agencies[4][$i])
            ->setDescription($this->agencies[5][$i])
            ->setInternalNotice($this->agencies[6][$i])
            ->setWebsiteUrl($this->agencies[7][$i])
            ->setTva($this->agencies[8][$i])
            ->setDuns($this->agencies[9][$i])
            ->setCreationDate(new \DateTime(rand(1, 28).'-'.rand(1, 12).'-'.rand(2012, 2018)));


        $manager->persist($agency);
        $this->addReference('agency_'.$i, $agency);

    }

}
