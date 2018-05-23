<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function HomepageAction()
    {
        return $this->render('Front/index.html.twig');
    }

    /**
     * @Route("/search", name="search")
     */
    public function SearchPageAction()
    {
        return $this->render('Front/search.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function ContactAction()
    {
        return $this->render('Front/contact.html.twig');
    }

    /**
     * @Route("/teacher", name="landingformateur")
     */
    public function landingFormateurAction()
    {
        return $this->render('Front/landingFormateur.html.twig');

    }

    /**
     * @Route("/creation", name="create")
     * @Method({"GET", "POST"})
     */
    public function CreateAction()
    {
        return $this->render('Front/create.html.twig');

    }
}