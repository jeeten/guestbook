<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * loginAction
     *
     * @param  mixed $authenticationUtils
     *
     * @return void
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // return the rendered response
        return $this->render('login/register.html.twig', [
            'controller_name' => 'LoginController',
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);

        
    }

    /**
     * login
     *
     * @param  mixed $authenticationUtils
     *
     * @return Response
     *
     * @Route("/login", name="app_login", methods={"GET","POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // return the rendered response
        return $this->render('login/index.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    
    /**
     * logout
     * @Route("/logout", name="logout")
     * @return void
     */
    public function logout() {}
}

