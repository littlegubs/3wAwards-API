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
        $this->createMember($manager, 'ROLE_USER', 'member', 'member@awfl-team.fr', 'Roger', 'Martin', 'member', 'France', 'Co-fondateur et directeur de création de l\'agence digitale Mentalworks, DA UX/UI, expert en stratégies digitales et en conception d\'architectures web/mobile.',1);

        $this->createMember($manager, 'ROLE_ADMIN', 'admin', 'admin@awfl-team.fr', 'Richard ', 'Dubois ', 'admin', 'Espagne','Co-fondateur et directeur de création de l\'agence digitale Mentalworks, DA UX/UI, expert en stratégies digitales et en conception d\'architectures web/mobile.',2);

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
     * @param string        $role
     * @param string        $username
     * @param string        $mail
     * @param string        $firstName
     * @param string        $lastName
     * @param string        $password
     * @param string        $presentation
     * @param int           $i
     *
     * @throws BadMethodCallException
     */
    private function createMember(ObjectManager $manager, $role, $username, $mail, $firstName, $lastName, $password, $country, $presentation ,$i)
    {

        $member = new Member();
        $member->setUsername($username);
        $member ->setCountry($country);
        $member->setGender('M');
        $member->setEmail($mail);
        $member->setPlainPassword($password);
        $member->setRoles([$role]);
        $member->setFirstName($firstName);
        $member->setLastName($lastName);
        $member->setPresentation($presentation);
        $member->setBirthday(new \DateTime('20-10-1997'));
        $member->setIsJudge(false);
        $member->setOptIn(false);
        $member->setEnabled(true);

        $manager->persist($member);
        $this->addReference('member_'.$i, $member);
    }
}
