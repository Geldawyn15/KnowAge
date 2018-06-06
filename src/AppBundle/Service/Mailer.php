<?php
namespace AppBundle\Service;

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

        $to = $this->getTo();
        $subject = 'Demande de contact';
        $body = $this->templating->render('Mail/contactMail.html.twig', array(
            'message' => $message
        ));
        $this->sendMail($subject, $body, $to, $reply);
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

}