<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\UpdateProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\ImgUploader;


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
    public function updateProfilAction(Request $request, ImgUploader $imgUpload)
    {
        $user = $this->getUser();
        $user->setprofilePicFile(null);
        $form = $this->createForm(UpdateProfileType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($user->getprofilePicFile()) {
                if ($user->getprofilePic()) {
                    $oldProfilePic = $user->getprofilePic();
                    unlink(__DIR__ .  '/../../../web' .$oldProfilePic);
                }
                $profilePic = $user->getprofilePicFile();
                $user->setprofilePic($imgUpload->uploadProfilPicture($profilePic));
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $user->setprofilePicFile(null);

            return $this->redirectToRoute('profil');

    }

        return $this->render('User/updateProfil.html.twig', array(
            'form'=>$form->createView()
        ));

    }



}