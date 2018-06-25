<?php

namespace AppBundle\Controller;


use AppBundle\Form\ForgotPasswordType;
use AppBundle\Form\InitializePasswordType;
use AppBundle\Form\ResetPasswordType;
use AppBundle\Form\UpdatePasswordType;
use AppBundle\Form\UpdateProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\ImgUploader;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Lock\Store\RedisStore;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use AppBundle\Entity\User;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use AppBundle\Service\Mailer;

/**
 * User controller.
 *
 * @Route("user")
 */
class UserController extends controller
{

    /**
     * @Route("/profil/{id}", name="profil")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function profilAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $currentUser = $this->getUser();
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
            $formationsCreated = $em->getRepository('AppBundle:Formation')->findBy(['author' => $user]);
            $findingFavoriteFormations = $em->getRepository('AppBundle:Formation')->findAll();
            $findingFavoriteFormateurs = $em->getRepository('AppBundle:User')->findAll();
            $payments = $em->getRepository('AppBundle:Paiement')->findBy(['user' => $user]);
            $favoriteFormations = [];
            $favoriteformateur = [];
            foreach ($findingFavoriteFormations as $findingFavoriteFormation){
                if ($user->isFormationFavorited($findingFavoriteFormation)){
                    $favoriteFormations[] = $findingFavoriteFormation;
                }
            }
            foreach ($findingFavoriteFormateurs as $findingFavoriteFormateur){
                if ($user->isFormateurFavorited($findingFavoriteFormateur)){
                    $favoriteformateur[] = $findingFavoriteFormateur;
                }
            }
            return $this->render('User/profil.html.twig', array(
                'formationscreated' => $formationsCreated,
                'payments' => $payments,
                'currentuser' => $currentUser,
                'user' => $user,
                'favoriteformations' => $favoriteFormations,
                'favoriteformateur' => $favoriteformateur,
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
                $oldProfilePic = $user->getprofilePic();
                if ( $oldProfilePic && file_exists(__DIR__ .  '/../../../web' .$oldProfilePic)) {
                    unlink(__DIR__ . '/../../../web' . $oldProfilePic);
                }
                $profilePic = $user->getprofilePicFile();
                $user->setprofilePic($imgUpload->uploadProfilPicture($profilePic));
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $user->setprofilePicFile(null);
            $this->addFlash('success', 'Profil modifié');
            return $this->redirectToRoute('profil', ['id' => $user->getId()]);

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
            $entityManager->flush();
            $this->addFlash('success', 'Mot de passe changé');

            return $this->redirectToRoute('profil', ['id' => $user->getId()]);
        }

        return $this->render('User/updatePassword.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/favoriteformation", name="favoriteformation")
     * @Method({"GET", "POST"})
     */
    public function favoriteFormationAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        if ($request->query->get('formationId')) {
            $formationId = $request->query->get('formationId');
            $favorited  = $request->query->get('favorited');
            $formation = $em->getRepository('AppBundle:Formation')->find(['id' => $formationId]);
            if (!$favorited) {
                $user->addFavoriteFormation($formation);
            } elseif ($favorited) {
                $user->removeFavoriteFormation($formation);
            }
        }
        $em->flush();
        return new Response();
    }

    /**
     * @Route("/favoriteformatuer", name="favoriteformatuer")
     * @Method({"GET", "POST"})
     */
    public function favoriteFormateurAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        if ($request->query->get('formateurId')) {
            $formateurId = $request->query->get('formateurId');
            $favorited  = $request->query->get('favorited');
            $formateur = $em->getRepository('AppBundle:User')->find(['id' => $formateurId]);
            if (!$favorited) {
                $user->addFavoriteFormateur($formateur);
            } elseif ($favorited) {
                $user->removeFavoriteFormateur($formateur);
            }
        }
        $em->flush();
        return new Response();
    }

    /**
     * @Route("/forgotpassword", name="forgotPassword")
     * @Method({"GET", "POST"})
     */
    public function forgotpassword(Request $request, Mailer $mailer)
    {
        $form = $this->createForm(ForgotPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $email = $data['email'];
            $userPasswordLost = $this->getDoctrine()
                ->getRepository(User:: class)
                ->findOneBy([
                'email' => $email
            ]);
            if ($userPasswordLost) {
                $token = uniqid();
                $userPasswordLost->setToken($token);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $url = $this->generateUrl('resetPassword', array('token' => $token), UrlGeneratorInterface::ABSOLUTE_URL);
                $subject = 'Mot de passe perdu, NoAge';
                $to = $userPasswordLost->getEmail();
                $mailer->sendForgotPasswordMail($to, $subject, $url);
                $this->addFlash('success', 'Consultez votre boite mail. Un message vous a été envoyé avec un lien pour réinitialiser votre mot de passe  ');
            } else {
                $this->addFlash('danger', 'Nous n\'avons pas trouvé d\'utilisateur avec cet email, merci de rééssayer');
                return $this->redirectToRoute('forgotPassword');
            }
        }
        return $this->render('User/forgotPassword.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/resetpassword/{token}", name="resetPassword")
     * @Method({"GET", "POST"})
     */
    public function resetPassword ($token, Request $request, UserPasswordEncoderInterface $encoder)
    {
        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $plainPassword = $data['newPassword'];
            $user = $this->getDoctrine()
                ->getRepository(User:: class)
                ->findOneBy([
                    'token' => $token
                ]);
            if ($user) {
                $encoded = $encoder->encodePassword($user, $plainPassword);
                $user->setPassword($encoded);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
                $this->addFlash('success', 'Votre mot de passe a été mis à jour');
                return $this->redirectToRoute('homepage');
            } else {
                $this->addFlash('danger', 'la réinitialisation de votre mot de passe a échoué, veuillez renouveler votre demande');

                return $this->redirectToRoute('forgotPassword');
            }
        }
        return $this->render('User/resetPassword.html.twig', array(
            'form'=>$form->createView()
        ));
    }



}