<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    // public function index(): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //         'controller_name' => 'UserController',
    //     ]);
    // }
    public function getUsers(ManagerRegistry $doctrine){
        $em= $doctrine->getManager();
        $listUsers = $em->getRepositories('App:Users')->findBy([], ['name'=>'ASC']);
        return $this->render('user/users.html.twig', [
            'listUsers' => $listUsers
        ]);
    }
}
