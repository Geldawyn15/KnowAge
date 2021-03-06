<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Entity\FormationPage;
use AppBundle\Entity\Paiement;
use AppBundle\Entity\Quiz\Question;
use AppBundle\Form\addFormationType;
use AppBundle\Form\QuizType;
use AppBundle\Service\ImgUploader;
use AppBundle\Service\Mailer;
use AppBundle\Service\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Formation controller.
 *
 * @Route("formation")
 */
class FormationController extends controller
{

    /**
     * create a formation / first step
     * @Route("/new", name="new")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request, ImgUploader $imgUpload)
    {
        $formation = new Formation();

        $form = $this->createForm(addFormationType::class, $formation);
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

            return $this->redirectToRoute('create', array(
                'id' => $formation->getId()
            ));
        }

        return $this->render('Formation/new.html.twig', array(
            'form'=>$form->createView()
        ));

    }


    /**
     * Homepage for create a formation
     *
     * @Route("/create/{id}", name="create")
     * @Method({"GET", "POST"})
     */
    public function homeCreateAction(Request $request, Formation $formation, $id)
    {
        if ($formation->getAuthor() != $this->getUser()) {

            throw $this->createNotFoundException('Vous n\'êtes pas autorisé à accéder à cette page');
        }


        return $this->render('Formation/homeCreate.html.twig', array(
            'formation' => $formation
        ));
    }




                    // WYSIWYG editor and Upload's roads for file and picture //

    /**
     * Second step for create a formation
     *
     * @Route("/new2/{id}", name="new2")
     * @Method({"GET", "POST"})
     */
    public function create2Action(Request $request, Formation $formation, $id)
    {
        if ($formation->getAuthor() != $this->getUser()) {

            throw $this->createNotFoundException('Vous n\'êtes pas autorisé à accéder à cette page');
        }

        $formationPage = new FormationPage($formation, FormationPage::TYPE_PAGE);

        if ($content = $request->request->get('content')) {

            $formationPage->setContent($content);
            $formation->addPage($formationPage);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'Votre page a bien été enregistrée ');

            return $this->redirectToRoute('create', array(
                'formation' => $formation,
                'id' => $id
            ));
        }

        return $this->render('Formation/new2.html.twig', array(
            'formation' => $formation,
        ));
    }


    /**
     * Upload picture from Wysiwyg editor
     *
     * @Route("/upload_picture", name="upload_picture")
     *
     */
    public function uploadPictureFormation(Request $request)
    {
        $allowedExts = ["gif", "jpeg", "jpg", "png"];
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if (in_array($extension, $allowedExts)) {

            $rootDir = $this->getParameter('kernel.project_dir');
            $name = uniqid() . "." . $extension;
            move_uploaded_file($_FILES["file"]["tmp_name"],  $rootDir."/web/upload/contenuFormation/picture/" . $name);
            $response = ['link' => '/upload/contenuFormation/picture/'. $name];

            return new Response(stripslashes(json_encode($response)));
        }
    }


    /**
     * Upload file from Wysiwyg editor
     *
     * @Route("/upload_file", name="upload_file")
     *
     */
    public function uploadFileFormation(Request $request)    {

        $allowedExts = array("txt", "pdf", "doc", "odt");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if (in_array($extension, $allowedExts)) {

            $rootDir = $this->getParameter('kernel.project_dir');
            $name = sha1(microtime()) . "." . $extension;
            move_uploaded_file($_FILES["file"]["tmp_name"],  $rootDir. "/web/upload/contenuFormation/file/" . $name);
            $response = ['link' => '/upload/contenuFormation/file/'. $name];

            return new Response(stripslashes(json_encode($response)));
        }
    }



                            // End of WYSIWYG editor and Upload's roads for file and picture //



    /**
     * Create a formation's quizz
     *
     * @Route("/quiz/{id}", name="quiz")
     *
     */
    public function quizAction(Request $request, Formation $formation, $id)
    {
        $formationPage = new FormationPage($formation, FormationPage::TYPE_QUIZ);
        $formation->addPage($formationPage);

        /** @var Question[] $questions */
        $questions = [];

        for ($i = 0; $i < 5; $i++) {

            $question = new Question($formationPage);
            $question->setResponses([
                new \AppBundle\Entity\Quiz\Response(),
                new \AppBundle\Entity\Quiz\Response(),
                new \AppBundle\Entity\Quiz\Response(),
            ]);
            $questions[] = $question;
        }

        $form = $this->createForm(QuizType::class, ['questions' => $questions]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $formationPage->setQuestions($questions);

            $em->flush();

            $this->addFlash('success', 'Votre page a bien été enregistrée ');

            return $this->redirectToRoute('create', array(
                'id' => $id,
            ));

        }

        return $this->render('Formation/quiz.html.twig', array(
            'form' => $form->createView()
            ));
    }


    /**
     * Displays content of a formation entity.
     *
     * @Route("/show/{id}/{page}", name="show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request, Formation $formation, $page)
    {
        $payment = $this->getDoctrine()->getRepository(Paiement::class)->findBy(['user' => $this->getUser(), 'formation' => $formation]);

        $page = $formation->getPage($page);



        if ($request->query->all()) {
            $page->handleQuizResponses($request);
        }

        /* if (!$payment) {
            throw $this->createNotFoundException('Vous n\'êtes pas autorisé à accéder à cette page');
        }*/

        return $this->render('Formation/show.html.twig', array(
            'page' => $page,
            'formation' => $formation,
        ));
    }


    /**
     * @Route("/achat/{id}", name="formation_Achat")
     * @Method({"GET", "POST"})
     */
    public function landingFormateurAchat(Formation $formation)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $verfifPaiement = $this->getDoctrine()->getRepository(Paiement::class)->findBy([
            'user' => $this->getUser(),
            'formation' => $formation,
            ]);

        if ($formation->getAuthor() !== ($user = $this->getUser()) && !$verfifPaiement)  {

            $paiement = new Paiement();
            $paiement->setUser($user);
            $paiement->setFormation($formation);

            $entityManager->persist($paiement);
            $entityManager->flush();

            $this->addFlash('success', 'Formation achetée !');

            return $this->redirectToRoute('landing_formation', array(
                'id' => $formation->getId()));

        }

        elseif ($formation->getAuthor() == $this->getUser()) {


            $this->addFlash('danger', 'Vous ne pouvez pas acheter votre formation!');

            return $this->redirectToRoute('landing_formation', ['id' => $formation->getId()]);
        }

        elseif ($verfifPaiement) {


            $this->addFlash('danger', 'Formation déjà achetée!');

            return $this->redirectToRoute('landing_formation', ['id' => $formation->getId()]);
        }
    }



    /**
     * Signals an inaproriate content in formation
     *
     * @Route("/signal/{id}", name="signalFormation")
     * @Method({"GET", "POST"})in/cpon
     */
    public function signalFormationAction(formation $formation, Request $request, Mailer $mailer, $id)
    {

        $user = $this->getUser();

        $form = $this->createForm('AppBundle\Form\SignalFormationType');
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $data = $form->getData();

                $message = $data['message'];
                $choice = $data['choices'];

                $mailer->signalFormationMail($message, $choice, $formation, $user);

                $this->addFlash('success', 'L\'administrateur a été informé d\'un contenu inaproprié pour cette formation');

                return $this->redirectToRoute('landing_formation', array (
                    'id' => $id
                ));

                }

        return $this->render('Formation/signalFormation.html.twig', array (
            'id' => $id,
            'form'=>$form->createView(),
        ));
    }
}

