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

            $user = $this->getUser();

            $picture = $formation->getPicture();
            $formation->setPicture($imgUpload->uploadFormationPicture($picture));
            $formation->setCreatedAt(new \DateTime());
            $formation->setAuthor($user);

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
     * @Route("/teacher", name="landingformateur")
     */
    public function landingFormateurAction()
    {
        return $this->render('Front/landingFormateur.html.twig');
    }

     /**
     * @Route("/creation/{id}/edit", name="creation_formation")
     * @Method({"GET", "POST"})
     */
    public function editFormationAction(Request $request, Formation $formation)
    {

        $editForm = $this->createForm('AppBundle\Form\FormationType', $formation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();

            //afficher les messages
            $this->addFlash('success', 'Votre formation est enregistrée avec succès');

            return $this->redirectToRoute('creation_formation', array('id' => $formation->getId()));



        }

        return $this->render('Formation/creation_formation.html.twig', array(
            'formation' => $formation,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Finds and displays a formation entity.
     *
     * @Route("/formation/{id}", name="formation_show")
     * @Method("GET")
     */
    public function showAction(Formation $formation)
    {

        return $this->render('Formation/FormationAbonne.html.twig', array(
            'formation' => $formation,

        ));
    }

}
