<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\BadMethodCallException;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MemberFixtures extends Fixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @throws BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $this->createMember($manager, 'ROLE_USER', 'member', 'member@awfl-team.fr', 'Roger','Martin', 'member', 1);

        $this->createMember($manager, 'ROLE_ADMIN', 'admin','admin@awfl-team.fr', 'Richard ','Dubois ','admin', 2);

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @param ObjectManager $manager
     * @param               $role
     * @param               $username
     * @param               $mail
     * @param               $firstName
     * @param               $lastName
     * @param               $password
     * @param               $i
     *
     * @throws BadMethodCallException
     */
    private function createMember(ObjectManager $manager, $role, $username, $mail, $firstName, $lastName, $password, $i)
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
        $this->addReference('member_'.$i, $member);
    }
}
