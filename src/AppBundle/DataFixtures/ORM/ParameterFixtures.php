<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Parameter;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ParameterFixtures extends Fixture implements OrderedFixtureInterface
{
    private $libelles = [
      'app_name',
      'logo',
      'adress',
      'complement',
      'tel',
      'fax',
      'email',
      'email_admin_alert',
      'email_admin_ask',
      'med_ranking_judges',
      'med_ranking_members',
      'nb_max_screen',
      'size_max_screen',
      'nb_max_tags'
    ]

    private $values = [
      '3Wawards',
      'jacky.jpg',
      '60204 COMPIEGNE CEDEX',
      'CS70454 LACROIX SAINT-OUEN';
      '0344862255',
      '0344862277',
      'contact@mentalworks.fr',
      'contact@mentalworks.fr',
      'contact@mentalworks.fr',
      '3',
      '4',
      '6',
      '10',
      '5'
    ]

    /**
     * @return int
     */
    public function getOrder()
    {
        return 0;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
      foreach ($this->libelles as $key => $value) {
          $this->createParameter($manager, $key);
      }
      $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    private function createParameter(ObjectManager $manager, $i)
    {
      $parameter = new Parameter();
      $parameter
        ->setLibelle($this->$libelles[$i])
        ->setValue($this->$values[$i]);
      $manager->persist($parameter);
    }
}
