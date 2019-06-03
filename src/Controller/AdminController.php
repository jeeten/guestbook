<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * index
     *
     * @return void
     */
    
    /**
     * @Route("/dashbord", name="app_admin")
     */
    public function index()
    {
        // Forwarding to the existing route
        $page['title'] = "Dashboard";

        return $this->forward('App\Controller\GuestController::index',['page' => (object)$page ]);   
    }

}
