<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Repository\AwardRepository;

class AwardController
{
    /**
     * @var AwardRepository
     */
    private $awardRepository;

    /**
     * AwardController constructor.
     *
     * @param  AwardRepository $awardRepository
     */
    public function __construct(AwardRepository $awardRepository)
    {
        $this->awardRepository = $awardRepository;
    }

    /**
     * @Route(
     *     name="three-last-awards",
     *     path="/award/three-last-awards",
     *     methods={"GET"}
     * )
     *
     *  @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $awards = $this->awardRepository->getThreeLastAward();

        return new JsonResponse([
            'awards' => $awards,
        ]);
    }


}