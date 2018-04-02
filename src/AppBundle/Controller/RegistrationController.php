<?php

namespace AppBundle\Controller;

use AppBundle\Repository\ProjectRepository;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController
{

    /**
     * @var UserManagerInterface
     */
    private $userManager;

    /**
     * RegistrationController constructor.
     *
     * @param UserManagerInterface $userManager
     */
    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param Request $request
     *
     * @Route(
     *     name="registration",
     *     path="/register",
     *     methods={"POST"}
     * )
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        
    }
}
