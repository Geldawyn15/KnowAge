<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Entity\Category;
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
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('Front/index.html.twig', array(
                'categories' => $categories,
        ));
    }


    /**
     * @Route("/search", name="search")
     * @Method({"GET", "POST"})
     */
    public function searchPageAction(Request $request)
    {

        $user = $this->getUser();
        $formations = null;
        $searchs = '';


        if ($request->query->get('category_id')) {

            $id = $request->query->get('category_id');
            $query = $this->getDoctrine()->getRepository(Formation::class)->findBy(['category' => $id]);

            $paginator  = $this->get('knp_paginator');

            $formations = $paginator->paginate(
                $query,
                $request->query->getInt('page', 1),
                4
            );
        }


        if ($request->query->get('search')) {

            $searchs = explode(' ', trim($request->query->get('search')));

            $repository = $this->getDoctrine()->getRepository(Formation::class);
            $formations = $repository->findFormation($searchs);

            $paginator  = $this->get('knp_paginator');
            $formations = $paginator->paginate(
                $formations,
                $request->query->getInt('page', 1),
                3
            );

        }

        return $this->render('Front/search.html.twig', array(
            'formations' => $formations,
            'user' => $user,
            'search' => $searchs,
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

            $this->addFlash('success', 'Formulaire envoyé !');

            return $this->redirectToRoute('contact');
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

    /**
     * @Route("/formateur", name="formateur")
     */
    public function landingFormateurAction()
    {
        return $this->render('Front/formateur.html.twig');
    }

}