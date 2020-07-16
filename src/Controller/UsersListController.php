<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsersListController extends AbstractController
{
    /**
     * @Route("/users/list", name="users_list")
     */
    public function index()
    {
        return $this->render('users_list/users_list.html.twig', [
            'controller_name' => 'UsersListController',
        ]);
    }
}
