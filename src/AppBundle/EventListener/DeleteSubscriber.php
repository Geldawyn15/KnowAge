<?php

namespace AppBundle\EventListener;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class DeleteSubscriber  implements EventSubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var SessionInterface
     */
    private $session;


    public function __construct(SessionInterface $session, TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager)
    {

        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
        $this->session = $session;
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => 'onKernelController',
        );
    }


    public function onKernelController(FilterControllerEvent $event)
    {
        if ($token = $this->tokenStorage->getToken()) {

            if (is_object($user = $token->getUser())) {
                // e.g. anonymous authentication


                if ($user->getIsDeleted()) {

                    $event->setController(function () {

                        $this->tokenStorage->setToken(null);
                        $this->session->getFlashBag()->add('danger', 'Ce compte n\'éxiste pas');
                        return new RedirectResponse('/login');

                    });

                }
            }

        }


    }


}