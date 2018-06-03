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
    public function homepageAction()
    {
        return $this->render('Front/index.html.twig');
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchPageAction()
    {
        return $this->render('Front/search.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     * @Method({"GET", "POST"})
     */
    public function contactAction()
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
}