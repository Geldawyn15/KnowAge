<?php

namespace AppBundle\Controller;


use AppBundle\Form\DeleteUserType;
use AppBundle\Form\ForgotPasswordType;
use AppBundle\Form\InitializePasswordType;
use AppBundle\Form\ResetPasswordType;
use AppBundle\Form\UpdatePasswordType;
use AppBundle\Form\UpdateProfileType;
use AppBundle\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\ImgUploader;
use Symfony\Component\HttpFoundation\Response;
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
     */
    public function profilAction(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $currentUser = $this->getUser();
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
     */
    public function updateProfilAction(Request $request, ImgUploader $imgUpload)
    {
        $user = $this->getUser();
        $user->setprofilePicFile(null);
        $form = $this->createForm(UpdateProfileType::class, $user);
        $form->handleRequest($request);
        $rootDir = $this->getParameter('kernel.project_dir');

        if ($form->isSubmitted() && $form->isValid()) {
            if ($user->getprofilePicFile()) {

                $oldProfilePic = $user->getprofilePic();

                if ($oldProfilePic && file_exists($rootDir .'/web' .$oldProfilePic)) {
                    unlink($rootDir .'/web' .$oldProfilePic);
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
     */
    public function updatePasswordAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $this->getUser();
        $form = $this->createForm(UpdatePasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($passwordEncoder->isPasswordValid($user, $user->getPlainPassword())) {

                $password = $passwordEncoder->encodePassword($user, $user->getnewPassword());
                $user->setPassword($password);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
                $this->addFlash('success', 'Le mot de passe a été modifié');

                return $this->redirectToRoute('profil', ['id' => $user->getId()]);

            } else {

                $this->addFlash('danger', 'Mot de passe invalide !');
                return $this->redirectToRoute('update_password');

            }
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
     * @Route("/deleteUser", name="deleteUser")
     *
     */
    public function deleteUser(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {


        $user = $this->getUser();


        $form = $this->createForm(DeleteUserType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            if ($passwordEncoder->isPasswordValid($user, $user->getPlainPassword())) {

                $user->setIsDeleted(new \DateTime("now"));
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();

                $this->addFlash('success', 'Votre compte sera supprimé d\'ici 30 jours, pour 
                le récuppérer veuillez contacter le webmaster');

                return $this->redirectToRoute('logout');

            } else {
                $this->addFlash('danger', 'mot de passe incorrect');
                return $this->redirectToRoute('deleteUser');

            }
        }

        return $this->render('User/deleteUser.html.twig', array(
            'form'=>$form->createView()
        ));






    }
}