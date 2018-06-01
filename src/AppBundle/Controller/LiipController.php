<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Manager\FileManager;
use Doctrine\ORM\EntityManagerInterface;
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

    /** @var EntityManagerInterface */
    protected $em;

    /**
     * LiipController constructor.
     *
     * @param FileManager            $fileManager
     * @param CacheManager           $cacheManager
     * @param EntityManagerInterface $em
     */
    public function __construct(FileManager $fileManager, CacheManager $cacheManager, EntityManagerInterface $em)
    {
        $this->fileManager = $fileManager;
        $this->cacheManager = $cacheManager;
        $this->em = $em;

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
        $project = $this->em->getRepository(Project::class)->find(1);
        var_dump($project); die;
        $webDir = $this->fileManager->xd().'/../web/uploads/';
        $tmpName = $_FILES['xd']['tmp_name'];
        $ext = pathinfo($_FILES['xd']['name'], PATHINFO_EXTENSION);
        $id = uniqid();
        move_uploaded_file($tmpName, $webDir.$id.'.'.$ext);

        return new JsonResponse('uploads/'.$id.'.'.$ext, 200);
    }
}
