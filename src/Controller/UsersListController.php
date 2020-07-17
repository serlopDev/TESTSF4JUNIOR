<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsersListController extends AbstractController
{
    // Lista de usuarios


    /**
     * @Route("/usuarios", name="users_list")
     */
    public function index(EntityManagerInterface $em)
    {
        $usersList = $em->getRepository(User::class)->findAll();
        return $this->render('users_list/users_list.html.twig', [
            'controller_name' => 'UsersListController',
            'users'=> $usersList,
        ]);
    }

    // Edición de usuario

    /**
     * @Route("/usuarios/{id}", name="edit_user")
     */
    public function editUser($id){
        $em = $this->getDoctrine()->getManager();
        $user = $em -> getRepository(User::class)-> find($id);

        return $this->render('users_list/editUser.html.twig', ['user'=> $user]);
    }
}
