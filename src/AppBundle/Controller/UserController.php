<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\UpdatePasswordType;
use AppBundle\Form\UpdateProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\ImgUploader;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * User controller.
 *
 * @Route("user")
 */
class UserController extends controller
{

    /**
     * @Route("/profil", name="profil")
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
     * @Route("/updateprofil", name="update_profil")
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
                if (!empty($user->getprofilePic())) {
                    $oldProfilePic = $user->getprofilePic();
                    if (file_exists(__DIR__ .  '/../../../web' .$oldProfilePic)) {
                        unlink(__DIR__ . '/../../../web' . $oldProfilePic);
                    }
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

    /**
     * @Route("/updatepassword", name="update_password")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function updatePasswordAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $this->getUser();
        $form = $this->createForm(UpdatePasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getnewPassword());
            $user->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('profil');
        }

        return $this->render('User/updatePassword.html.twig', array(
            'form'=>$form->createView()
        ));
    }



}