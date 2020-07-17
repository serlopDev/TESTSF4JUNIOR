<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
     * @Route("/usuario/editar/{id}", name="edit_user")
     */

    public function updateUser(Request $request, UserPasswordEncoderInterface $passwordEncoder, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if(!$user){
            throw $this->createNotFoundException('No se encuentra el usuario con id: '.$id);
        }

        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $user->setPassword($passwordEncoder->encodePassword($user, $form['password']->getData()));
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('users_list');
        }

        return $this->render('users_list/editUser.html.twig',['user' => $user, 'editForm' => $form->createView()]);
    }


    
     // Eliminar usuario

    /**
     * @Route("/usuarios/borrar/{id}", name="delete_user")
     */

     public function deleteUser($id){
         $user = new User();
         $em = $this->getDoctrine()->getManager();

         $user = $em->getRepository(User::class)->find($id);
         
         $em->remove($user);
         $em->flush();

         return $this->redirectToRoute('users_list');
     }

}
