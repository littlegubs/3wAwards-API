<?php


namespace AppBundle\EventListener;

use AppBundle\Entity\Member;
use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManager;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;

class JWTCreatedListener
{
    /**
     * @var UserManager
     */
    private $userManager;
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var CacheManager
     */
    protected $liipManager;

    public function __construct(UserManager $userManager, EntityManager $em, CacheManager $cacheManager)
    {
        $this->userManager = $userManager;
        $this->entityManager = $em;
        $this->liipManager = $cacheManager;
    }

    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $repository = $this->entityManager->getRepository(Member::class);

        $user = $this->userManager->findUserByUsername($event->getUser()->getUsername());
        /** @var Member $member */
        $member = $repository->find($user->getId());

        $payload = $event->getData();
        $payload['id'] = $member->getId();
        $payload['firstName'] = $member->getFirstName();
        $payload['lastName'] = $member->getLastName();
        if (null !== $member->getProfilePicture()) {
            $newPath = $this->liipManager->getBrowserPath($member->getProfilePicture()->getPath(), 'profile_pic_header');
            $payload['icon'] = $newPath;
        }


        $event->setData($payload);
    }

}
