<?php

namespace AppBundle\Controller;

use AppBundle\Form\UpdateProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UserController extends controller
{

    /**
     * @Route("/user/profil", name="profil")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function profilAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();


        $formationsCree = $em->getRepository('AppBundle:Formation')->findBy(['author' => $user]);
        $formationsSuivee = $em->getRepository('AppBundle:Paiement')->findBy(['userid' => $user]);
        return $this->render('User/profil.html.twig', array(
            'formationscree' => $formationsCree,
            'formationssuivee' => $formationsSuivee,
        ));
    }

    /**
     * @Route("/user/updateprofil", name="update_profil")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function updateProfilAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(updateProfileType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('profil');
        }
        return $this->render('User/updateProfil.html.twig', array(
            'form'=>$form->createView()
        ));

    }



}