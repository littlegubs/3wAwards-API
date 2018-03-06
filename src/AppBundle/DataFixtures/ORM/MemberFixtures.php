<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MemberFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $this->createMember($manager, 'ROLE_USER', 'member', 'member@awfl-team.fr', 'Roger','Martin', 'member');

        $this->createMember($manager, 'ROLE_ADMIN', 'admin','admin@awfl-team.fr', 'Richard ','Dubois ','admin');

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }

    private function createMember(ObjectManager $manager, $role, $username, $mail, $firstName, $lastName, $password)
    {

        $member = new Member();
        $member
            ->setUsername($username)
            ->setGender('M')
            ->setEmail($mail)
            ->setPlainPassword($password)
            ->setRoles([$role])
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setBirthday(new \DateTime('20-10-1997'))
            ->setIsJudge(false)
            ->setOptIn(false)
            ->setEnabled(true);

        $manager->persist($member);
    }
}