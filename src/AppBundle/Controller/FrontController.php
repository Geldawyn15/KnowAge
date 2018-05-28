<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Formation;
use AppBundle\Form\addFormationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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
     * @Route("/formation/landingformation", name="formation")
     * @Method({"GET", "POST"})
     */
    public function landingFormationAction()
    {
        return $this->render('Front/landingFormation.html.twig');
    }

    /**
     * @Route("/creation", name="create")
     * @Method({"GET", "POST"})
     *
     */
    public function CreateAction(Request $request)
    {
        $formation = new Formation();

        $form = $this->createForm(addFormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            return $this->redirectToRoute('search');
        }

        return $this->render('Front/create2.html.twig', array(
            'form'=>$form->createView()
        ));

    }

}