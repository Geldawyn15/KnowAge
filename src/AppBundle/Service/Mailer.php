<?php
namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Entity\Formation;

class Mailer
{
    protected $mailer;
    protected $templating;
    private $from = 'romain.poilpret@gmail.com';
    private $to = 'romain.poilpret@gmail.com';



    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    protected function sendMail($subject, $body, $to)
    {
        $mail = \Swift_Message::newInstance();

        $mail
            ->setFrom($this->from)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }

    public function sendContactMail($message, $reply)
    {

        $to = $this->to;
        $subject = 'Demande de contact';
        $body = $this->templating->render('Mail/contactMail.html.twig', array(
            'message' => $message
        ));
        $this->sendMail($subject, $body, $to, $reply);
    }


    public function signalFormationMail($message, $choice, $formation, $user)    {

        $subject = 'Un utilisateur a signalé un contenu inaproprié pour une formation';
        $body = $this->templating->render('Mail/signalMail.html.twig', array(
            'message' => $message,
            'choice' => $choice,
            'formation' => $formation,
            'user' =>$user,
        ));
        $to = 'pellecuer.david@gmail.com';

        $this->sendMail($subject, $body, $to);
    }



    public function sendTeacherMail($to, $message, $object, $reply)
    {
        $body = $this->templating->render('Mail/teacherMail.html.twig', array(
            'message' => $message,
            'object' => $object,
        ));
        $this->sendMail($object, $body, $to, $reply);
    }

    public function sendForgotPasswordMail($to, $subject, $url, $userPasswordLost)
    {
        $body = $this->templating->render('Mail/forgotPasswordMail.html.twig', array(
            'user' => $userPasswordLost,
            'subject' => $subject,
            'url' => $url,
        ));
        $this->sendMail($subject, $body, $to);
    }

    public function sendBadRanking ($to, $subject, $userWhoRates, $formation)
    {
        $body = $this->templating->render('Mail/badRank.html.twig', array(
            'userWhoRate' => $userWhoRates,
            'formation' => $formation,

        ));
        $this->sendMail($subject, $body, $to);
    }
}