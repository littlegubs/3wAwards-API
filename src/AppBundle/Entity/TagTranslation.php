<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Class TagTranslation
 *
 * @ORM\Entity
 * @ApiResource(
 *     itemOperations={
 *     "get"
 *     })
 * @ApiFilter(SearchFilter::class, properties={"locale": "exact", "translatable": "exact"})
 */
class TagTranslation
{
    use ORMBehaviors\Translatable\Translation;


    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     *
     * @return $this
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }


}
