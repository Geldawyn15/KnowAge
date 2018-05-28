<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends controller
{


    /**
     * @Route("/user/profile", name="profile")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function profile()
    {
        return $this->render('User/profile.html.twig');

    }

    /**
     * @Route("/user/updateprofile", name="update_profile")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function updateProfile()
    {
        return $this->render('User/updateProfile.html.twig');

    }

}