<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function deletedUser()
    {
        $queryBuilder = $this->createQueryBuilder('u')
            ->delete('AppBundle:User', 'u')
            ->andWhere("u.isDeleted IS NOT NULL")

            //date de supp doit être plus récente que le paramètre 1
            ->andwhere("u.isDeleted < ?1")

            //on set le paramètre avec la date du jour - 31 jours
            ->setParameter(1, date_modify(new \DateTime("now"), '-31 day'));

        $query = $queryBuilder->getQuery();
        $result = $query->getResult();

        return $result;
    }
}