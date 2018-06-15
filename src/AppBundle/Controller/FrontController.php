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
        $user = $this->getUser();
        $searchs = explode(' ', trim($request->query->get('search')));
        if ($request->query->get('search')) {

            $searchs = explode(' ', trim($request->query->get('search')));
        }

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
            'user' => $user,
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
     * @Route("/favorite", name="favorite")
     * @Method({"GET", "POST"})
     */
    public function favoriteAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        if ($request->query->get('formationId')) {
            $formationId = $request->query->get('formationId');
            $favorited  = $request->query->get('favorited');
            $formation = $em->getRepository('AppBundle:Formation')->find(['id' => $formationId]);
            if (!$favorited) {
                $user->addFavoriteFormation($formation);
            } elseif ($favorited) {
                $user->removeFavoriteFormation($formation);
            }
        }

        $em->flush();
        return new Response();
    }

}