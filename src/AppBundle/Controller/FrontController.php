<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\Mailer;




class FrontController extends controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        return $this->render('Front/index.html.twig');
    }


    /**
     * @Route("/search", name="search")
     * @Method({"GET", "POST"})
     */
    public function searchPageAction(Request $request)
    {

        $searchs = explode(' ', trim($request->query->get('search')));

        $repository = $this->getDoctrine()->getRepository(Formation::class);
        $formations = $repository->findFormation($searchs);

        $paginator  = $this->get('knp_paginator');
        $formations = $paginator->paginate(
            $formations,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('Front/search.html.twig', array(
            'formations' => $formations,
        ));
    }


    /**
     * @Route("/contact", name="contact")
     *
     */
    public function contactAction(Request $request, Mailer $mailer)
    {
        $form = $this->createForm('AppBundle\Form\ContactType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $firstname = $data['firstname'];
            $name = $data['name'];
            $email = $data['email'];
            $message = $data['message'];

            $mailer->sendContactMail($message, $email);


            return $this->redirectToRoute('con');
        }
        return $this->render('Front/contact.html.twig', array(
            'form' => $form->createView()

        ));
    }

    /**
     * @Route("/formation", name="formation")
     */
    public function homepageFormationAction(Request $request)
    {
        return $this->render('Formation/landingFormation.html.twig');
    }

}