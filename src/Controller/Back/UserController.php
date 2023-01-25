<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/back/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_back_user')]
    public function index(): Response
    {
        return $this->render('back/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
