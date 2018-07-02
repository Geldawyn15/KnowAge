<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Comments;
use AppBundle\Entity\Formation;
use AppBundle\Entity\Category;
use AppBundle\Entity\User;
use AppBundle\Form\CommentType;
use AppBundle\Form\ForgotPasswordType;
use AppBundle\Form\ResetPasswordType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\Mailer;
use AppBundle\Form\ContactTeacherType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FrontController extends controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('Front/index.html.twig', array(
                'categories' => $categories,
        ));
    }


    /**
     * @Route("/search", name="search")
     * @Method({"GET", "POST"})
     */
    public function searchPageAction(Request $request)
    {

        $user = $this->getUser();
        $formations = null;
        $searchs = '';
        $id= '';


        if ($request->query->get('category_id')) {

            $id = $request->query->get('category_id');
            $query = $this->getDoctrine()->getRepository(Formation::class)->findBy(['category' => $id]);

            $paginator  = $this->get('knp_paginator');


            $formations = $paginator->paginate(
                $query,
                $request->query->getInt('page', 1),
                4
            );

        }


        if ($request->query->get('search')) {

            $searchs = explode(' ', trim($request->query->get('search')));

            $repository = $this->getDoctrine()->getRepository(Formation::class);
            $formations = $repository->findFormation($searchs);

            $paginator  = $this->get('knp_paginator');
            $formations = $paginator->paginate(
                $formations,
                $request->query->getInt('page', 1),
                3
            );

        }

        return $this->render('Front/search.html.twig', array(
            'formations' => $formations,
            'user' => $user,
            'search' => $searchs,
            'id' => $id,
        ));

    }


    /**
     * @Route("/contact", name="contact")
     *
     */
    public function contactAction(Request $request, Mailer $mailer)
    {
        $form = $this->createForm('AppBundle\Form\ContactType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $firstname = $data['firstname'];
            $name = $data['name'];
            $email = $data['email'];
            $message = $data['message'];

            $mailer->sendContactMail($message, $email);

            $this->addFlash('success', 'Formulaire envoyé !');

            return $this->redirectToRoute('contact');
        }

        return $this->render('Front/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/favorite", name="favorite")
     * @Method({"GET", "POST"})
     */
    public function favoriteAction(Request $request)
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
     * @Route("/formateur", name="formateur")
     */
    public function landingFormateurAction()
    {
        return $this->render('Front/formateur.html.twig');
    }


    /**
     * Finds and displays a formation entity.
     *
     * @Route("/show/{id}", name="landing_formation")
     * @Method({"GET", "POST"})
     */
    public function landingAction(Request $request, Formation $formation, Mailer $mailer)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $shortText = $formation->shortText(250);

        $contactForm = $this->createForm(ContactTeacherType::class);
        $contactForm->handleRequest($request);

        $comment = new Comments();
        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);

        $comments = $this->getDoctrine()->getRepository(Comments::class)->findBy(['formation' => $formation->getId()], ['createdAt' => 'ASC']);
        $paginator  = $this->get('knp_paginator');

        $comments = $paginator->paginate(
            $comments,
            $request->query->getInt('page', 1),
            3
        );

        // Post a comment
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {

            $user = $this->getUser();

            $comment->setAuthor($user);
            $comment->setCreatedAt(new \DateTime('now'));
            $comment->setFormation($formation);

            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Commentaire envoyé');

        }


        // Send mail to teacher
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {

            $data = $contactForm->getData();

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
            'contactForm' => $contactForm->createView(),
            'commentForm' => $commentForm->createView(),
            'shortText' => $shortText,
            'comments' => $comments

        ));
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
                // UrlGeneratorInterface::ABSOLUTE_URL
                $subject = 'Mot de passe perdu, NoAge';
                $to = $userPasswordLost->getEmail();
                $mailer->sendForgotPasswordMail($to, $subject, $url, $userPasswordLost);
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