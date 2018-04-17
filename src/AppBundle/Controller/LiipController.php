<?php

namespace AppBundle\Controller;

use AppBundle\Manager\FileManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LiipController
{

    /** @var FileManager */
    protected $fileManager;

    /**
     * LiipController constructor.
     *
     * @param FileManager $fileManager
     */
    public function __construct(FileManager $fileManager)
    {
        $this->fileManager = $fileManager;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @Route(
     *     name="liip_bundle",
     *     path="/xd",
     *     methods={"GET", "POST"}
     * )
     *
     */
    public function __invoke(Request $request)
    {
        $webDir = $this->fileManager->xd().'/../web/uploads';
        $xd = $_FILES['xd']['name'];

        return new JsonResponse('ok', 200);
    }
}
