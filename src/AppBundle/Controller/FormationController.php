<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Form\addFormationType;
use AppBundle\Service\ImgUploader;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Service\Mailer;
use Twig\Node\Expression\GetAttrExpression;


/**
 * Formation controller.
 *
 * @Route("formation")
 */
class FormationController extends controller
{
    
    /**
     * @Route("/landingformation/{id}", name="landingformation")
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

            return $this->redirectToRoute('create2', array(
                'id' => $formation->getId()
            ));
        }

        return $this->render('Formation/new.html.twig', array(
            'form'=>$form->createView()
        ));

    }

    /**
     * @Route("/new2/{id}", name="create2")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function create2Action(Request $request, Formation $formation, $id)
    {

        if ($formation->getAuthor() == $this->getUser()) {

            $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);

            $form = $this->createForm('AppBundle\Form\FormationType', $formation);
            $form->handleRequest($request);
        }

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

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
     * @Method("GET")
     */
    public function showAction(Formation $formation, $id)
    {

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
        return $this->render('Formation/Formateur.html.twig');

    }


}

