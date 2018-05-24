<?php

namespace AppBundle\Controller;

use AppBundle\Manager\FileManager;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LiipController
{

    /** @var FileManager */
    protected $fileManager;

    /** @var CacheManager */
    protected $cacheManager;

    /**
     * LiipController constructor.
     *
     * @param FileManager  $fileManager
     * @param CacheManager $cacheManager
     */
    public function __construct(FileManager $fileManager, CacheManager $cacheManager)
    {
        $this->fileManager = $fileManager;
        $this->cacheManager = $cacheManager;

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
        $webDir = $this->fileManager->xd().'/../web/uploads/';
        $tmpName = $_FILES['xd']['tmp_name'];
        $ext = pathinfo($_FILES['xd']['name'], PATHINFO_EXTENSION);
        $id = uniqid();
        move_uploaded_file($tmpName, $webDir.$id.'.'.$ext);

        return new JsonResponse('uploads/'.$id.'.'.$ext, 200);
    }
}
