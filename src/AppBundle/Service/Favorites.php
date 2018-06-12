<?php
namespace AppBundle\Service;


use Doctrine\ORM\EntityManagerInterface;


class Favorites
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

}