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
    private $toAdmin = 'pellecuer.david@gmail.com';



    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    protected function sendMail($subject, $body, $to, $reply)
    {
        $mail = \Swift_Message::newInstance();

        $mail
            ->setFrom($this->from)
            ->setTo($to)
            ->setSubject($subject)
            ->setReplyTo($reply)
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

    public function sendTeacherMail($to, $message, $object, $reply)
    {
        $body = $this->templating->render('Mail/teacherMail.html.twig', array(
            'message' => $message,
            'object' => $object,
        ));
        $this->sendMail($object, $body, $to, $reply);
    }

    public function sendInapropriateContent(user $user, $message)
    {
        $from = $user->getEmail() . " " . $user->getNickName();
        $subject = 'Un utilisateur a signalé un contenu inaproprié';
        $to = 'pellecuer.david@gmail.com';
        $body = $this->templating->render('Mail/contactMail.html.twig', array(
            'message' => $message
        ));
        $this->sendMail($subject, $body, $to, $from);
    }
}