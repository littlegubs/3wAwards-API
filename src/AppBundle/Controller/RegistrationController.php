<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Member;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
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
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * RegistrationController constructor.
     *
     * @param UserManagerInterface   $userManager
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(UserManagerInterface $userManager, EntityManagerInterface $entityManager)
    {
        $this->userManager = $userManager;
        $this->em          = $entityManager;
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
        try {
            $member = new Member();
            $member->setFirstName($request->get('firstName'))
                ->setLastName($request->get('name'))
                ->setEmail($request->get('email'))
                ->setUsername($request->get('email'))
                ->setPlainPassword($request->get('password'))
                ->setEnabled(true)
                ->setIsJudge(false)
                ->setOptIn(false)
                ->setRoles([$request->get('role')]);
            $this->userManager->updatePassword($member);

            $this->em->persist($member);
            $this->em->flush();

            $jsonResponse = JsonResponse::create(null, 200);
        }catch (UniqueConstraintViolationException $exception) {
            $data =
            $jsonResponse = JsonResponse::create(null, 500);
            $jsonResponse->setData(['data' => 'e-mail']);
        }
        catch (\Exception $exception) {
            return new JsonResponse([
                'hmhm' => $exception->getMessage(),
            ]);
        }
        return $jsonResponse;
    }
}
