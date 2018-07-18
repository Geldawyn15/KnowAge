<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comments;
use AppBundle\Entity\Formation;
use AppBundle\Entity\Category;
use AppBundle\Entity\FormationPage;
use AppBundle\Entity\Rating;
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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
     */
    public function search(Request $request)
    {
        $user = $this->getUser();
        $formations = null;
        $search = $request->query->get('search');
        $categoryId = $request->query->get('category_id');

        if ($categoryId) {
            $formations = $this->getDoctrine()->getRepository(Formation::class)->findBy(['category' => $categoryId]);
        }

        if ($search) {
            $repository = $this->getDoctrine()->getRepository(Formation::class);
            $formations = $repository->findFormation($search);
        }

        if ($formations) {
            $formations = $this->get('knp_paginator')->paginate(
                $formations,
                $request->query->getInt('page', 1),
                9
            );
        }

        return $this->render('Front/search.html.twig', array(
            'formations' => $formations,
            'search' => $search,
            'id' => $categoryId,
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
            $favorited = $request->query->get('favorited');
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
    public function landingAction(Request $request, Formation $formation, Mailer $mailer)    {

        $entityManager = $this->getDoctrine()->getManager();
        $formationPage = $this->getDoctrine()->getRepository(FormationPage::class)->findOneBy(['formation' => $formation, 'ordering' => 0]);
        $pageOrdering = $formationPage->getordering();


        //Affichage de la note moyenne

        $averageRateArray = $entityManager->getRepository('AppBundle:Rating')->findBy(
            ['formation' => $formation],
            ['rating' => 'ASC']
        );
        $averagerate = 0;
        $arrayrate = [];

        for ($i = 0; $i < count($averageRateArray); $i++) {
            $arrayrate[] = $averageRateArray[$i]->getRating();
        }

        if (count($arrayrate)) {
            $arrayrate = array_filter($arrayrate);
            $averagerate = array_sum($arrayrate) / count($arrayrate);
        }
        //Fin d'affichage de la note moyenne

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
            9
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

            return $this->redirectToRoute('landing_formation', array(
                'id' => $formation->getId(),
                'page_ordering' => $pageOrdering,
                'formation_page' => $formationPage,
            ));
        }

        // Send mail to teacher
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData();            $email = $data['email'];
            $subject = $data['objet'];
            $message = $data['message'];
            $to = $formation->getAuthor()->getEmail();
            $mailer->sendTeacherMail('romain.poilpret@gmail.com', $message, $subject, $email);

            return $this->redirectToRoute('landing_formation', array(
                'id' => $formation->getId(),
                'page_ordering' => $pageOrdering,
                'formation_page' => $formationPage,
            ));

            }

        return $this->render('Front/landing_formation.html.twig', array(
                    'formation' => $formation,
                    'contactForm' => $contactForm->createView(),
                    'commentForm' => $commentForm->createView(),
                    'shortText' => $shortText,
                    'comments' => $comments,
                    'average' => $averagerate,
                    'page_ordering' => $pageOrdering,
                    'formation_page' => $formationPage,


        ));
    }


    /**
     * Rates a formation.
     *
     * @Route("/formation/{formation_id}/rating/{rate}", name="rating", requirements={"formation_id": "\d+"})
     * @Security("has_role('ROLE_USER')")
     *
     * @ParamConverter("formation", options={"mapping": {"formation_id": "id"}})
     *
     * @Method({"GET", "POST"})
     */
    public function ratingAction(Formation $formation, $rate, Mailer $mailer)
    {
        $user = $this->getUser();
        $userAlreadyRate = $this->getDoctrine()
            ->getRepository(Rating:: class)
            ->findOneBy([
                'user' => $user,
                'formation' => $formation,
            ]);

        if (!$userAlreadyRate) {

            $rating = new Rating();
            $rating->setUser($user);
            $rating->setFormation($formation);
            $rating->setRating($rate);

            $em = $this->getDoctrine()->getManager();
            $formation = $em->getRepository('AppBundle:Formation')->find($formation);
            $em->persist($rating);
            $em->flush();

            //send Formateur if badRate
            $userWhoRates = $this->getUser();
                if ($rate and $rate <3){
                    $mailer->sendBadRanking($userWhoRates, $formation);
                }

            $this->addFlash('success', 'Vous avez attribué la note de ' .  $rate . ' / 5 à cette formation. Merci de votre contribution');
            return $this->redirectToRoute('landing_formation', array(
                'id' => $formation->getId(),
            ));
        } else {
            $this->addFlash('danger', 'Vous avez déjà noté cette formation');
        } return $this->redirectToRoute('landing_formation', array(
        'id' => $formation->getId(),
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

    /**
     * @Route("/legalmention", name="legalMention")
     *
     */
    public function showLegalMention (Request $request)
    {
        return $this->render('Front/legalMention.html.twig');
    }
}