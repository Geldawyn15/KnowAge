<?php

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Entity\formation;
use AppBundle\Form\UpdateProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UserController extends controller
{


    /**
     * @Route("/user/profile", name="profile")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function profileAction()
    {

        $em = $this->getDoctrine()->getManager();
        $formations = $em->getRepository('AppBundle:Formation')->findBy(['author' => '8']);
        return $this->render('User/profile.html.twig', array(
        'formations' => $formations,
    ));
    }

    /**
     * @Route("/user/updateprofile", name="update_profile")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function updateProfileAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(updateProfileType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('profile');
        }
        return $this->render('User/updateProfile.html.twig', array(
            'form'=>$form->createView()
        ));

    }



}