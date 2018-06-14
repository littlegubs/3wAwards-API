<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class UpdateJuryController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * RegistrationController constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em          = $entityManager;
    }

    /**
     * @param Request $request
     *
     * @Route(
     *     name="updateJury",
     *     path="/admin/update-jury",
     *     methods={"POST"}
     * )
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $member = $this->em->getRepository('AppBundle:Member')->find($request->get('id'));
            $member->setIsJudge(1);
            $this->em->flush();
            $jsonResponse = JsonResponse::create(null, 200);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'hmhm' => $exception->getMessage(),
            ]);
        }
        return $jsonResponse;

    }

}