<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProjectRepository extends EntityRepository
{
    public function lastTwelveProjects ()
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.isValidate = 1')
            ->orderBy('p.projectName','DESC')
            ->setMaxResults(12)
            ->getQuery()->getResult();

        var_dump($qb);
        die();
        return $qb;
    }
}
