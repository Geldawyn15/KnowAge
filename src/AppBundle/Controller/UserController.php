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
        $em = $this->getDoctrine()->getManager();
<<<<<<< HEAD
            $formations = $em->getRepository('AppBundle:Formation')->findBy(['author' => '3']);
        return $this->render('User/profile.html.twig', array(
=======
        $formations = $em->getRepository('AppBundle:Formation')->findBy(['author' => '8']);
        return $this->render('User/profil.html.twig', array(
>>>>>>> 32daccdc685f8b3f0bc69abb6634f9d9a4e90ce3
        'formations' => $formations,
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