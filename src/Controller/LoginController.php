<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/acceder", name="acceder")
     */
    public function index()
    {
        return $this->render('login/login.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
}
