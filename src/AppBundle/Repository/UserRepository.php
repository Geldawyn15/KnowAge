<?php
namespace AppBundle\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\Query\Expr;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    //Creation de la query pour récupérer les user avec une date (isDeleted) < à 30 jours par rapport à la date du jour
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

        // retourne les user avec une date isDeleted passer de 31 jours
        return $result;
    }

    public function countDeletedUser()
    {


        return $this->createQueryBuilder('u')
            ->select('COUNT(u.isDeleted)')
            ->andWhere("u.isDeleted IS NOT NULL")
            ->andwhere("u.isDeleted < ?1")
            ->setParameter(1, date_modify(new \DateTime("now"), '-31 day'))
            ->getQuery()
            ->getSingleScalarResult();
    }

}