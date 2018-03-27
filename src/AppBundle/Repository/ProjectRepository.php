<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class ProjectRepository extends EntityRepository
{
    public function lastTwelveProjects ()
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.isValidate = 1')
            ->orderBy('p.publicationDate','DESC')
            ->setMaxResults(12)
            ->getQuery()->getResult(Query::HYDRATE_ARRAY);

        return $qb;
    }

}
