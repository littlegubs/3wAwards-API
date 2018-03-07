<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class TagFixtures extends Fixture implements OrderedFixtureInterface
{
    private $tagsSiteType = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsPurpose = ['Complete reshaping', 'Technical reshaping', 'Graphical reshaping', 'Version upgrade', 'Technology changement', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsBusinessSector = ['Auto', 'Insurrance', 'Banking', 'Administration', 'Industry', 'Education', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsTarget = ['B2B', 'B2C', 'C2B', 'C2C', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsLanguage = ['fr', 'en', 'hr', 'ch', 'es', 'de', 'pl', 'ru', 'ja', 'nl', 'ro', 'wa', 'hi', 'ko', 'sv', 'vi', 'no'];
    private $tagsBudgetFork = ['-5k', '5-10k', '10-20k', '20-40k', '40-80k', '80-120k', '120-160k', '160-200k', '200-240k', '240-280k', '280-320k', '320-360k', '360-500k', '500-750k', '750-900k', '900-1000k', '1000k+'];
    private $tagsColor = ['Red', 'Yellow', 'Green', 'Blue', 'White' , 'Black', 'Grey', 'Light blue', 'Orange', 'Dark green', 'Light red', 'Gold', '', '', '', '', ''];
    private $tagsStyle = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsBehavior = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsAccessibility = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsAgencyMission = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsCustom = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsMainFonctionnality = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsFrontTech = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsBackTech = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsCms = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    private $tagsChallenge = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];


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

    }

    /**
     * @param ObjectManager $manager
     */
    private function createTag(ObjectManager $manager)
    {
        $tag = new Tag();
    }
}
