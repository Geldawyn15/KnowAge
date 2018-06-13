<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Form\addFormationType;
use AppBundle\Form\ContactTeacherType;
use AppBundle\Form\FormationType;
use AppBundle\Service\ImgUploader;
use AppBundle\Service\Mailer;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Twig\Node\Expression\GetAttrExpression;

/**
 * Formation controller.
 *
 * @Route("formation")
 */
class FormationController extends controller
{
    
    /**
     * @Route("/    landingformation/{id}", name="landingformation")
     * @Method({"GET", "POST"})
     */
    public function landingFormationAction(Formation $formation)
    {
        $titleFormation = $formation->getTitle();
        $authorFormation = $formation->getAuthor()->getNickName();
        $descriptionFormation = $formation->getDescription();
        $dateYMDHIS = $formation->getCreatedAt()->format('Y-m-d');
        $pictureFormation = $formation->getPicture();
        $shortText = $formation->shortText();


        return $this->render('Formation/landingFormation.html.twig', array(
            'titleFormation' => $titleFormation,
            'authorFormation' => $authorFormation,
            'descriptionFormation' => $descriptionFormation,
            'dateYMD' => $dateYMDHIS,
            'pictureFormation' => $pictureFormation,
            'shortText' => $shortText
        ));
    }

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

            return $this->redirectToRoute('formation_show', array(
                'id' => $id
            ));
        }

        return $this->render('Formation/new2.html.twig', array(
            'form'=>$form->createView()
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
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/formateur", name="formateur")
     */
    public function landingFormateurAction()
    {
        return $this->render('Formation/Formateur.html.twig');
    }

}
