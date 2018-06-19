<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Entity\Paiement;
use AppBundle\Entity\User;
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
use Symfony\Component\HttpFoundation\Response;


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

        if ($content = $request->request->get('content')) {
        dump($content);die;
            $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
            $formation->setContent($content);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            $this->addFlash('success', 'Votre formation est enregistrée avec succès');

            return $this->redirectToRoute('landing_formation', array(
                'id' => $id
            ));
        }

        return $this->render('Formation/new2.html.twig', array(
            'id' => $id,
        ));
    }

    /**
     * @Route("/upload_picture", name="upload_picture")
     *
     * @Security("has_role('ROLE_USER')")
     *
     */
    public function pictureFormation(Request $request)
    {
        $allowedExts = ["gif", "jpeg", "jpg", "png"];
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if (in_array($extension, $allowedExts)) {

            $name = uniqid() . "." . $extension;
            //dump(__DIR__);die;
            $test = move_uploaded_file($_FILES["file"]["tmp_name"],  __DIR__ ."/../../../web/upload/contenuFormation/" . $name);

            $response = ['link' => '/upload/contenuFormation/'. $name];
            return new Response(stripslashes(json_encode($response)));



        }


    }

    /**
     * Finds and displays a formation entity.
     *
     * @Route("/landing/{id}", name="landing_formation")
     * @Method({"GET", "POST"})
     */
    public function landingAction(Request $request, Formation $formation, Mailer $mailer)
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

            return $this->redirectToRoute('landing_formation', array(
                'id' => $formation->getId(),
            ));
        }

        return $this->render('Formation/landing_formation.html.twig', array(
            'formation' => $formation,
            'form' => $form->createView(),
            'shortText' => $shortText

        ));
    }

    /**
     * Displays a formation entity.
     *
     * @Route("/show/{id}", name="show")
     * @Method({"GET", "POST"})
     */
    public function showAction($id) {

        $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);

        return $this->render('Formation/show.html.twig', array(
            'formation' => $formation,
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
     * @Route("/achat/{id}", name="formation_Achat")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function landingFormateurAchat(Formation $formation)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $verfifPaiement = $this->getDoctrine()->getRepository(Paiement::class)->findBy([
            'user' => $this->getUser(),
            'formation' => $formation,
            ]);

        if ($formation->getAuthor() !== ($user = $this->getUser()) && !$verfifPaiement)  {

            $paiement = new Paiement();
            $paiement->setUser($user);
            $paiement->setFormation($formation);

            $entityManager->persist($paiement);
            $entityManager->flush();

            $this->addFlash('success', 'Formation achetée !');

            return $this->redirectToRoute('landing_formation', array(
                'id' => $formation->getId()));

        }

        elseif ($formation->getAuthor() == $this->getUser()) {
            
            $this->addFlash('danger', 'Vous ne pouvez pas acheter votre formation!');

            return $this->redirectToRoute('landing_formation', ['id' => $formation->getId()]);
        }

        elseif ($verfifPaiement) {

            $this->addFlash('danger', 'Formation déjà achetée!');

            return $this->redirectToRoute('landing_formation', ['id' => $formation->getId()]);
        }
    }

    /**
     * Signals an inaproriate content in formation
     *
     * @Route("signal/{id}", name="signalFormation")
     * * @Method({"GET", "POST"})
     * * @Security("has_role('ROLE_USER')")
     */
    public function signalFormationAction(formation $formation, Request $request, Mailer $mailer, $id)
    {

        $user = $this->getUser();

        $form = $this->createForm('AppBundle\Form\SignalFormationType');
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $data = $form->getData();

                $message = $data['message'];
                $choice = $data['choices'];

                $mailer->signalFormationMail($message, $choice, $formation, $user);

                $this->addFlash('success', 'L\'administrateur a été informé d\'un contenu inaproprié pour cette formation');

                return $this->redirectToRoute('landing_formation', array (
                    'id' => $id
                ));

                }

        return $this->render('Formation/signalFormation.html.twig', array (
            'id' => $id,
            'form'=>$form->createView(),
        ));
    }
}

