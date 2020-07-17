<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/registro", name="register")
     */
    public function index(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // Recogemos los datos y los seteamos

            $user = $form->getData();
            $user->setPassword($passwordEncoder->encodePassword($user, $form['password']->getData()));

            // Persistimos y enviamos a BBDD

            $em->persist($user);
            $em->flush();

            // Redirección
            
            return $this->redirectToRoute('app_login');
        }
        


        return $this->render('register/register.html.twig', [
            'controller_name' => 'RegisterController',
            'registerForm' => $form->createView()
        ]);
    }
}
