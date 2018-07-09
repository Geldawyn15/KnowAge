<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use \Symfony\Component\HttpFoundation\RedirectResponse;

class ResponseListener extends ContainerAwareCommand implements EventSubscriberInterface
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => 'onKernelResponse',
        );
    }
    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }
        $response = $event->getResponse();
        if($response instanceof RedirectResponse) {
            if (preg_match('/(login)/', $response->getTargetUrl())) {
                $this->session->getFlashBag()->add('danger',
                    'Vous devez etre connecté pour accéder à cette page.');
            }


        }

    }

}