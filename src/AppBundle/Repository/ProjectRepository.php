<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use AppBundle\Entity\Project;

class ProjectRepository extends EntityRepository
{
    public function getLastTwelveProjects ()
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.status = :status ')
            ->setParameter('status', Project::STATUS_ACCEPTED)
            ->orderBy('p.publicationDate','DESC')
            ->setMaxResults(12)
            ->getQuery()->getResult(Query::HYDRATE_ARRAY);

        return $qb;
    }

}
