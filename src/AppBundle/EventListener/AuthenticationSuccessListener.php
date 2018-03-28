<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Member;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AuthenticationSuccessListener
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $repository = $this->container->get('doctrine')->getRepository(Member::class);

        $user = $userManager->findUserByUsername($event->getUser()->getUsername());
        $payload = $event->getData();
        $member = $repository->find($user->getId());

        $payload['firstName'] = $member->getFirstName();
        $payload['lasName'] = $member->getLastName();

        $event->setData($payload);
        
    }

}