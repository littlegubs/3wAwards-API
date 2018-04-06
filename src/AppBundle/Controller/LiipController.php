<?php

namespace AppBundle\Controller;

use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LiipController
{
    /**
     * @var CacheManager
     */
    protected $liipManager;

    public function __construct(CacheManager $cacheManager)
    {
        $this->liipManager = $cacheManager;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @Route(
     *     name="liip_bundle",
     *     path="/liip",
     *     methods={"GET"}
     * )
     *
     */
    public function __invoke(Request $request)
    {
        $path = $request->get('path');
        $filter = $request->get('filter');
        $newPath = $this->liipManager->getBrowserPath($path, $filter);

        return new JsonResponse($newPath, 200);
    }
}
