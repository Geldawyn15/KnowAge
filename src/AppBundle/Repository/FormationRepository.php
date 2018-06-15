<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use Symfony\Component\HttpFoundation\Request;


/**
 * FormationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FormationRepository extends EntityRepository
{

    public function findFormation(array $searchs)
    {

        $query = $this->createQueryBuilder('a');

        foreach ($searchs as $i => $search) {

            $query->orWhere('a.title LIKE :title'.$i)
                  ->orWhere('a.description LIKE :description'.$i)
                  ->setParameter('title'.$i, '%' . $search . '%')
                  ->setParameter('description'.$i, '%' . $search . '%');

        }
        return $query;
    }
}
