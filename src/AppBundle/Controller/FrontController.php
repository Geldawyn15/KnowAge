<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Formation;
use AppBundle\Form\addFormationType;
use AppBundle\Service\ImgUpload;
use AppBundle\Service\ImgUploader;
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
    public function createAction(Request $request, ImgUploader $imgUpload)
    {
        $formation = new Formation();

        $form = $this->createForm('AppBundle\Form\addFormationType', $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $picture = $formation->getPicture();
            $formation->setPicture($imgUpload->upload($picture));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            return $this->redirectToRoute('search');
        }

        return $this->render('Front/create2.html.twig', array(
            'form'=>$form->createView()
        ));

    }

    /**
     * @Route("/formation", name="HomepageFormation")
     * @Method({"GET", "POST"})composer install
     */
    public function HomepageFormationAction(request $request)
    {
        $formation = new Formation();

        $form = $this->createForm('AppBundle\Form\FormationType', $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            return $this->redirectToRoute('formation');
        }



        return $this->render('Front/formation.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing formation entity.
     *
     * @Route("/formation/2/edit", name="Formation_edit")
     * @Method({"GET", "POST"})
     */
    public function EditFormationAction(request $request, Formation $formation)
    {

        $editForm = $this->createForm('AppBundle\Form\FormationType', $formation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Formation_edit', array('id' => $formation->getId()));
        }

        return $this->render('Front/formation_edit.html.twig', array(
            'formation' => $formation,
            'edit_form' => $editForm->createView(),

        ));
    }


}