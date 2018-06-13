<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Client;
use AppBundle\Entity\Project;
use AppBundle\Entity\Tag;
use AppBundle\Entity\TypeTag;
use AppBundle\Entity\Member;
use AppBundle\Entity\Agency;
use Doctrine\Common\DataFixtures\BadMethodCallException;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class TagFixtures extends Fixture implements OrderedFixtureInterface
{
    private $allTags = [
        /* site type */
        ['Showcase', 'Mobile', 'WebApp', 'e-shop', 'Blog', 'Social', 'Visit card', 'Portfolio', 'Portal', 'Mag',
            'Event', 'Intranet'],
        /* Purpose */
        ['Complete reshaping', 'Technical reshaping', 'Graphical reshaping', 'Version upgrade',
            'Technology changement'],
        /* Business Sector */
        ['Auto', 'Insurrance', 'Banking', 'Administration', 'Industry', 'Education'],
        /* Target */
        ['B2B', 'B2C', 'C2B', 'C2C'],
        /* Language */
        ['fr', 'en', 'hr', 'ch', 'es', 'de', 'pl', 'ru', 'ja', 'nl', 'ro', 'wa', 'hi', 'ko', 'sv', 'vi', 'no'],
        /* Budget Fork */
        ['-5k', '5-10k', '10-20k', '20-40k', '40-80k', '80-120k', '120-160k', '160-200k', '200-240k', '240-280k',
            '280-320k', '320-360k', '360-500k', '500-750k', '750-900k', '900-1000k', '1000k+'],
        /* Colors */
        ['#ffffff', '#000000', '#999999', '#FD0100', '#FE8A01', '#FFDC02', '#80D300', '#27A101', '#00B09C', '#1888DA', '#00568D',
            '#0E00C6', '#6500C9', '#8F01C9', '#8F02C5', '#D40280'],
        /* Style */
        ['Flat design', 'OnePage', 'Flash', 'LongScroll', 'Parallax', 'Animations', 'Fullscreen', 'Video', 'Modern'],
        /* Behavior */
        ['Adaptative Design', 'Fluid Design', 'Infinite Scroll', 'Responsive'],
        /* Accessibility */
        [1, 1, 2, 2, 1, 1, 3, 1, 3, 1, 3, 2, 2, 2],
        /* Agency missions */
        ['Concil', 'Front development', 'Back development', 'Ux Design', 'UI design', 'SEO', 'Visual Identity'],
        /* Custom */
        ['Voitures', 'Distributeur automobile', 'Concession', 'Occasion', 'Garage', 'Gueudet', 'Renault', 'BMW', 'MINI',
            'Dacia', 'Toyota', 'Nissan', 'Opel'],
        /* Main Fonctionnality */
        ['Catalog', 'Appointement manager', 'Multi brand', 'Advanced browser', 'Interactive map', 'Job',
            'Import schedules', 'Automtic schedule updates', 'Intefacing'],
        /* Front Tech */
        ['HTML5', 'CSS3', 'Js', 'Ts', 'Angular', 'Twig', 'Jquery', 'Google Maps', 'Node', 'ReactJs'],
        /* Back Tech */
        ['Php', 'Symfony', 'CakePhp', 'Elastic Search', 'MySql', 'MongoDb', 'NoSql', 'OpenSource', 'Kibana', 'Npm'],
        /* CMS */
        ['Drupal', 'Wordpress', 'Prestashop', 'Shopify', 'Joomla', 'Magento', 'SmartBase (owner)'],
        /* Challenge */
        [1, 2, 5, 5, 4, 2, 1, 5, 2, 4, 3, 5, 1, 4, 4, 1, 1],
        /* Skills */
        ['Dev Front-End', 'Dev Back-end', 'Full Stack'],
        /* Interest */
        ['UX Design', 'Création de sites web', 'Web Design', 'E-Marketing', 'Stratégie Web', 'Création de logo', 'UI Design', 'Charte & identité visuelle'],
        /* Client size*/
        ['TPE','PME','TGE'],
        /* Effectif */
        ['10','20','30'],
        /* Status */
        ['indépendant', 'pas indépendant'],
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
        $i = 0;
        foreach ($this->allTags as $typeTagKey => $tags) {
            foreach ($tags as $key => $tag) {
                $this->createTag($manager, $tag, $typeTagKey, $i);
                $i++;
            };
        };
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @param int           $tagKey
     * @param int           $typeTagKey
     * @param int           $key
     *
     * @throws BadMethodCallException
     */
    private function createTag(ObjectManager $manager, $tagKey, $typeTagKey, $key)
    {
        /** @var TypeTag $typeTagRef */
        $typeTagRef = $this->getReference('type_tag_'.$typeTagKey);

        $tag = new Tag();
        $tag
            ->setLibelle($tagKey)
            ->setType($typeTagRef);

        if ($typeTagKey <= 15) {
            /** @var Project $project */
            $project = $this->getReference('project_'.rand(0, 4));

            $tag->addProject($project);
        }
        if ($typeTagKey > 16) {
            /** @var Member $member */
            $member = $this->getReference('member_'.rand(1, 2));

            /** @var Agency $agency */
            $agency = $this->getReference('agency_'.rand(0, 4));

            /** @var Client $client */
            $client = $this->getReference('client_'.rand(0, 4));

            $tag->addMember($member);
            $tag->addAgency($agency);
            $tag->addClient($client);
        }

        $manager->persist($tag);

        $this->addReference("tag_".$key, $tag);
    }
}
