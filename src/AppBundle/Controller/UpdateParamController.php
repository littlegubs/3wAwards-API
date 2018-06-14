<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UpdateParamController
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
     *     name="updateParam",
     *     path="/admin/update-param",
     *     methods={"POST"}
     * )
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $param = $this->em->getRepository('AppBundle:Parameter')->find($request->get('libelle'));
            $param->setValue($request->get('param'));
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