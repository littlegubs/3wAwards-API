<?php


namespace AppBundle\EventListener;

use AppBundle\Entity\Member;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JWTCreatedListener
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $repository = $this->container->get('doctrine')->getRepository(Member::class);

        $user = $userManager->findUserByUsername($event->getUser()->getUsername());
        /** @var Member $member */
        $member = $repository->find($user->getId());

        $payload = $event->getData();
        $payload['id'] = $member->getId();
        $payload['firstName'] = $member->getFirstName();
        $payload['lastName'] = $member->getLastName();
        if (null !== $member->getProfilePicture()) {
            $payload['icon'] = $member->getProfilePicture()->getPath();
        }


        $event->setData($payload);
    }

}
