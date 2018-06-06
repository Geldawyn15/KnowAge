<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\Mailer;

class FrontController extends controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\SearchFormationType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $datas = $form->getData();

            $repository = $this->getDoctrine()->getRepository(Formation::class);
            $formations = $repository->findFormation($datas);

            return $this->redirectToRoute('search', array(
                'formations' => $formations,
            ));
        }

        return $this->render('Front/index.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchPageAction()
    {
        $searchWord = 'author';
        $em = $this->getDoctrine()->getManager();
        return $this->render('Front/search.html.twig');
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


            return $this->redirectToRoute('search');
     }
        return $this->render('Front/contact.html.twig', array(
            'form'=>$form->createView()

        ));
    }

    /**
     * @Route("/teacher", name="landingformateur")
     */
    public function landingFormateurAction()
    {
        return $this->render('Front/landingFormateur.html.twig');
    }

}