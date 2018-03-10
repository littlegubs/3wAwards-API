<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class TagFixtures extends Fixture implements OrderedFixtureInterface
{
    private $tagsSiteType = ['Showcase', 'Mobile', 'WebApp', 'e-shop', 'Blog', 'Social', 'Visit card', 'Portfolio', 'Portal', 'Mag', 'Event', 'Intranet'];
    private $tagsPurpose = ['Complete reshaping', 'Technical reshaping', 'Graphical reshaping', 'Version upgrade', 'Technology changement'];
    private $tagsBusinessSector = ['Auto', 'Insurrance', 'Banking', 'Administration', 'Industry', 'Education'];
    private $tagsTarget = ['B2B', 'B2C', 'C2B', 'C2C'];
    private $tagsLanguage = ['fr', 'en', 'hr', 'ch', 'es', 'de', 'pl', 'ru', 'ja', 'nl', 'ro', 'wa', 'hi', 'ko', 'sv', 'vi', 'no'];
    private $tagsBudgetFork = ['-5k', '5-10k', '10-20k', '20-40k', '40-80k', '80-120k', '120-160k', '160-200k', '200-240k', '240-280k', '280-320k', '320-360k', '360-500k', '500-750k', '750-900k', '900-1000k', '1000k+'];
    private $tagsColor = ['Red', 'Yellow', 'Green', 'Blue', 'White' , 'Black', 'Grey', 'Light blue', 'Orange', 'Dark green', 'Light red', 'Gold', 'Purple', 'Pink', 'Brown', 'Salmon', ''];
    private $tagsStyle = ['Flat design', 'OnePage', 'Flash', 'LongScroll', 'Parallax', 'Animations', 'Fullscreen', 'Video', 'Modern'];
    private $tagsBehavior = ['Adaptative Design', 'Fluid Design', 'Infinite Scroll', 'Responsive'];
    private $tagsAccessibility = [1, 1, 2, 2, 1, 1, 3, 1, 3, 1, 3, 2, 2, 2];
    private $tagsAgencyMission = ['Concil', 'Front development', 'Back development', 'Ux Design', 'UI design', 'SEO', 'Visual Identity'];
    private $tagsCustom = ['Voitures', 'Distributeur automobile', 'Concession', 'Occasion', 'Garage', 'Gueudet', 'Renault', 'BMW', 'MINI', 'Dacia', 'Toyota', 'Nissan', 'Opel'];
    private $tagsMainFonctionnality = ['Catalog', 'Appointement manager', 'Multi brand', 'Advanced browser', 'Interactive map', 'Job', 'Import schedules', 'Automtic schedule updates', 'Intefacing'];
    private $tagsFrontTech = ['HTML5', 'CSS3', 'Js', 'Ts', 'Angular', 'Twig', 'Jquery', 'Google Maps', 'Node', 'ReactJs'];
    private $tagsBackTech = ['Php', 'Symfony', 'CakePhp', 'Elastic Search', 'MySql', 'MongoDb', 'NoSql', 'OpenSource', 'Kibana', 'Npm'];
    private $tagsCms = ['Drupal', 'Wordpress', 'Prestashop', 'Shopify', 'Joomla', 'Magento', 'SmartBase (owner)'];
    private $tagsChallenge = [1,2,5,5,4,2,1,5,2,4,3,5,1,4,4,1,1];


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
