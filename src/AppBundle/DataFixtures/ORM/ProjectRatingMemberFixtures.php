<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Member;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectRatingMember;
use AppBundle\Entity\Rating;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ProjectRatingMemberFixtures extends Fixture implements OrderedFixtureInterface
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 6;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $this->createProjectRatingMember($manager);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    private function createProjectRatingMember(ObjectManager $manager)
    {
        $projectRatingMember = new ProjectRatingMember();
        /** @var Rating $rating */
        $rating = $this->getReference('rating_'.rand(0, 9));
        /** @var Project $project */
        $project = $this->getReference('project_'.rand(0, 4));
        /** @var Member $member */
        $member = $this->getReference('member_'.rand(1, 2));

        $projectRatingMember
            ->setDate(new \DateTime(rand(1, 28).'-'.rand(1, 12).'-'.rand(2012, 2018)))
            ->setRating($rating)
            ->setProject($project)
            ->setMember($member)
            ->setVoteJudge((rand(0, 1) === 1));

        $manager->persist($projectRatingMember);
    }
}
