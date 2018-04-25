<?php

namespace Controller;

class FrontController extends AbstractController
{

    public function index()
    {
       return $this->twig->render('index.html.twig');
    }

    public function landingFormateur()
    {
        return  $this->twig->render('landingFormateur.html.twig');
    }

    public function search()
    {
        return  $this->twig->render('search.html.twig');
    }


}