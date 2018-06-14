<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UpdateStatusController
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
     *     name="updateProjectStatus",
     *     path="/admin/update-project-status",
     *     methods={"POST"}
     * )
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $project = $this->em->getRepository('AppBundle:Project')->find($request->get('id'));
            $project->setStatus($request->get('status'));
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