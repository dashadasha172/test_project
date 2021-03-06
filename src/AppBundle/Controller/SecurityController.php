<?php
/**
 * Created by PhpStorm.
 * User: dasha
 * Date: 04.12.15
 * Time: 19:26
 */

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends  Controller
{
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request){

        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
        throw new \Exception('nope');
    }

    /**
     * @Route("/logout", name="logout_route")
     */
    public function logoutAction()
    {
        throw new \Exception('nope');
    }
}