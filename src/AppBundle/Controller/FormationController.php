<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Form\addFormationType;
use AppBundle\Service\ImgUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class FormationController extends controller
{
    /**
     * @Route("/formation/landingformation", name="formation")
     * @Method({"GET", "POST"})
     */
    public function landingFormationAction()
    {
        return $this->render('Formation/landingFormation.html.twig');
    }

    /**
     * @Route("/creation", name="create")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function createAction(Request $request, ImgUploader $imgUpload)
    {
        $formation = new Formation();

        $form = $this->createForm('AppBundle\Form\addFormationType', $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $picture = $formation->getPicture();
            $formation->setPicture($imgUpload->uploadFormationPicture($picture));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            return $this->redirectToRoute('search');
        }

        return $this->render('Formation/create.html.twig', array(
            'form'=>$form->createView()
        ));

    }

    /**
     * @Route("/creation2", name="HomepageFormation")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function create2Action(request $request)
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



        return $this->render('Formation/create2.html.twig', array(
            'form'=>$form->createView()
        ));
    }

}
