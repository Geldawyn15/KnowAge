<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Form\addFormationType;
use AppBundle\Form\ContactTeacherType;
use AppBundle\Form\FormationType;
use AppBundle\Service\ImgUploader;
use AppBundle\Service\Mailer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Formation controller.
 *
 * @Route("formation")
 */
class FormationController extends controller
{

    /**
     * @Route("/new", name="new")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function createAction(Request $request, ImgUploader $imgUpload)
    {
        $formation = new Formation();

        $form = $this->createForm(addFormationType::class, $formation);
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

            return $this->redirectToRoute('new2', array(
                'id' => $formation->getId()
            ));
        }

        return $this->render('Formation/new.html.twig', array(
            'form'=>$form->createView()
        ));

    }

    /**
     * @Route("/new2/{id}", name="new2")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function create2Action(Request $request, Formation $formation, $id)
    {

        if ($formation->getAuthor() != $this->getUser()) {

            throw $this->createNotFoundException('Vous n\'êtes pas autorisé à accéder à cette page');
        }

            $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);

            $form = $this->createForm(FormationType::class, $formation);
            $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            //afficher les messages
            $this->addFlash('success', 'Votre formation est enregistrée avec succès');


            return $this->redirectToRoute('formation_show', array(
                'id' => $id
            ));
        }

        return $this->render('Formation/new2.html.twig', array(
            'form'=>$form->createView(),
            'id' => $id,
        ));
    }



    /**
     * Finds and displays a formation entity.
     *
     * @Route("/show/{id}", name="formation_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request, Formation $formation, Mailer $mailer, $id)
    {

        $form = $this->createForm(ContactTeacherType::class);
        $form->handleRequest($request);
        $shortText = $formation->shortText(250);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $email = $data['email'];
            $subject = $data['objet'];
            $message = $data['message'];
            $to = $formation->getAuthor()->getEmail();

            $mailer->sendTeacherMail('romain.poilpret@gmail.com', $message, $subject, $email);

            return $this->redirectToRoute('formation_show', array(
                'id' => $id,
            ));
        }

        return $this->render('Formation/show.html.twig', array(
            'formation' => $formation,
            'form' => $form->createView(),
            'shortText' => $shortText
        ));
    }

    /**
     * @Route("/formateur", name="formateur")
     */
    public function landingFormateurAction()
    {
        return $this->render('Formation/formateur.html.twig');


    }

    /**
     * Signals an inaproriate content in formation
     *
     * @Route("/{id}", name="signalFormation")
     * * @Method({"GET", "POST"})
     */
    public function signalFormationAction(formation $formation, Request $request, Mailer $mailer, $id)
    {
        //Récupère les variables
        $user = $this->getUser();



        //traite le formulaire
        $form = $this->createForm('AppBundle\Form\SignalFormationType');
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $data = $form->getData();

                $message = $data['message'];
                $choice = $data['choices'];

                $mailer->signalFormationMail($message, $choice, $formation, $user);


                //afficher les messages
                $messageFlash = 'L\'administrateur a été informé d\'un contenu inaproprié pour cette formation';
                $this->addFlash('success', $messageFlash);

                return $this->redirectToRoute('formation_show', array (
                    'id' => $id
                ));

                }

        return $this->render('Formation/signalFormation.html.twig', array (
            'id' => $id,
            'form'=>$form->createView(),
        ));
    }
}

